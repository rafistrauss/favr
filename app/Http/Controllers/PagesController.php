<?php namespace App\Http\Controllers;

use App\Category;
use App\FavorUser;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Favor;
use App\User;

class pagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     */
    public function index()
    {

    }

    /**
     *
     */
    public function create()
    {

    }

    public function createfavor(Requests\CreateFavorRequest $request)
    {
        $user = $request->user();
        $category_id = Category::select('id')->where('name', $request->input('category'))->first()->id;
        $request['category_id'] = $category_id;
        $request['start_time'] = Carbon::now();

        //check if he has enough points to submit this favor
        if ($this->checkUserPoints($request['price'], $user->points)) {
            $favor = Favor::create($request->all());
            FavorUser::create(['user_id' => $user->id, 'favor_id' => $favor->id]);
            $user->points = $user->points - $request['price'];
            $user->save();
            return Redirect::to(url('/favorasked'));
        } else {
            return Redirect::to(url('pages/actualfavor/Laundry'))
                ->withErrors("You don't have enough points.")
                ->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        $user = $request->user();
        return view('pages.dashboard', compact('user'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        $user = $request->user();
        return view('pages.account', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function newfavor()
    {
        return view('pages.newfavor');
    }

    public function postcategories()
    {
        return view('pages.postcategories');
    }

    public function docategories()
    {
        return view('pages.docategories');
    }

    public function actualfavor($category)
    {
        return view('pages.actualfavor', compact('category'));
    }

    public function checkUserPoints($proposal, $actual)
    {
        if ($proposal > $actual) {
            return false;
        }
        return true;
    }

    public function favorasked()
    {
        return view('pages.favorasked');
    }

    public function myfavors(Request $request)
    {
        $user = $request->user();
        $completed_by_user = FavorUser::all()->where('completed_by_user', $user->id)->count();
        $total_for_user = FavorUser::all()->where('user_id', $user->id)->count();

        $currentlyDoing = \DB::table('favor')
            ->join('userfavorrel', 'favor.id', '=', 'userfavorrel.favor_id')
            ->select('favor.name', 'favor.end_time', 'favor.price')
            ->where('userfavorrel.in_progress', 1)
            ->where('userfavorrel.completed_by_user', null)
            ->where('favor.end_time', '>', Carbon::now())
            ->where('userfavorrel.doer_id', $user->id)
            ->get();

        $inProgress = \DB::table('favor')
            ->join('userfavorrel', 'favor.id', '=', 'userfavorrel.favor_id')
            ->select('favor.name', 'favor.end_time', 'favor.price')
            ->where('userfavorrel.in_progress', 1)
            ->whereNotNull('userfavorrel.doer_id')
            ->where('userfavorrel.user_id', $user->id)
            ->where('favor.end_time', '>', Carbon::now())
            ->where('userfavorrel.completed_by_user', null)
            ->get();

        $areActive = \DB::table('favor')
            ->join('userfavorrel', 'favor.id', '=', 'userfavorrel.favor_id')
            ->select('favor.name', 'favor.end_time', 'favor.price')
            ->where('userfavorrel.in_progress', 0)
            ->where('userfavorrel.completed_by_user', null)
            ->where('favor.end_time', '>', Carbon::now())
            ->where('userfavorrel.user_id', $user->id)
            ->where('userfavorrel.doer_id', null)
            ->get();
        return view('pages.myfavors', compact('user', 'completed_by_user', 'total_for_user', 'currentlyDoing', 'inProgress', 'areActive'));
    }

    public function printingfeed($category)
    {
        $message = "";
        $category_id = Category::select('id')->where('name', $category)->first();
        if ($category_id) {
            $favors = Favor::all()->where('category_id', $category_id->id);
        }
        if(sizeof($favors) <= 0 || $category === 'all') {
            $favors = Favor::all();
            if ($category !== "all") {
                $message = 'There are no favors in the ' . $category . ' category, check out these other favors!';
            }
        }
        $users = array();
        foreach ($favors as $favor) {
            $favorUser = FavorUser::all()->where('favor_id', $favor->id)->first();
            $user = User::find($favorUser->user_id);
            array_push($users, $user);
        }

        return view('pages.printingfeed', compact('favors', 'users', 'message'));
    }
}
