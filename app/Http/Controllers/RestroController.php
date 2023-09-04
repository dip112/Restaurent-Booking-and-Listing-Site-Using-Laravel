<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\App;
use App\Models\Resturant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class RestroController extends Controller
{
    //
    function index()
    {
        return view('home');
    }
    function indexAdmin(Request $req)
    {
        if($req->session()->get('user')['is_admin']==1)
        {
            $users = User::all()->count();
            $owners = User::where('user_type','=', 'Owner')->count();
            $customers = $users-$owners;
            $bookings = Booking::all()->count();
            $res = Resturant::all()->count();
            return view('admin_home', ['users'=>$users, 'owners'=>$owners, 'customers'=>$customers, 'bookings'=>$bookings, 'res'=>$res]);
        }
        else{
            $owner_id = $req->session()->get('user')['user_id'];
            $res = Resturant::where('res_user_id', '=', $owner_id)->count();
            $bookings = Booking::where('booking_res_owner_id', '=', $owner_id)->count();
            return view('admin_home', ['res'=>$res, 'bookings'=>$bookings]);
        }
        
    }
    function lists()
    {
        $data = Resturant::all();
        return view('lists', ['data' => $data]);
    }
    function add(Request $req)
    {
        $req->validate([
            'res_banner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $resturant = new Resturant();
        $resturant->res_user_id = $req->session()->get('user')['user_id'];
        $resturant->res_name = $req->input('res_name');
        $resturant->res_address = $req->input('res_address');
        $resturant->res_description = $req->input('res_description');
        $resturant->res_price = $req->input('res_price');
        $resturant->res_image = $req->file('res_banner')->store('images');
        $resturant->save();
        $req->session()->flash('status', 'Restaurant Added Successfully!');
        return redirect('res_list');
    }
    function userRegister(Request $req)
    {
        $user = new User();
        $user->user_fname = $req->input('user_fname');
        $user->user_lname = $req->input('user_lname');
        $user->user_mail = $req->input('user_mail');
        $user->user_type = $req->input('user_type');
        $user->user_password = Crypt::encrypt($req->input('user_pass'));
        $user->save();
        $req->session()->flash('Status', 'Registration successful');
        return redirect('login');
    }
    function login(Request $req)
    {
        $user = User::where('user_mail', $req->input('user_mail'))->get();
        if (sizeof($user) != 0 && (Crypt::decrypt($user[0]->user_password) == $req->input('user_pass')) && $user[0]->is_admin == 1) {
            $req->session()->put('user', $user[0]);
            return redirect('admin');
        } 
        else if (sizeof($user) != 0 && (Crypt::decrypt($user[0]->user_password) == $req->input('user_pass')) && $user[0]->user_type == 'Customer') {
            $req->session()->put('user', $user[0]);
            return redirect('/');
        } 
        else if (sizeof($user) != 0 && (Crypt::decrypt($user[0]->user_password) == $req->input('user_pass')) && $user[0]->user_type == 'Owner') {
            $req->session()->put('user', $user[0]);
            return redirect('admin');
        } 
        else {
            $req->session()->flash('status', 'User Id or Password is wrong!');
            return redirect('login');
        }
    }
    function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        return redirect('/');
    }
    function getResData($id)
    {
        $res = Resturant::find($id);
        return view('booking', ['data' => $res]);
    }
    function booked(Request $req)
    {
        $user_id = $req->session()->get('user')['user_id'];
        if (Booking::where('booking_user_id', '=', $user_id)->exists()) {
            $req->session()->flash('status', 'Already booked by this user!');
            return redirect("book/{$req->input('booking_res_id')}");
        } else {
            $book = new Booking();
            $book->booking_user_id = $req->session()->get('user')['user_id'];
            $book->booking_res_id = $req->input('booking_res_id');
            $book->booking_res_owner_id = $req->input('booking_res_owner_id');
            $book->booking_phone = $req->input('booking_phone');
            $book->booking_childs = $req->input('booking_child');
            $book->booking_adults = $req->input('booking_adult');
            $book->booking_date = $req->input('booking_date');
            $book->booking_type = $req->input('booking_type');
            $book->save();
            $req->session()->flash('status', 'Restaurant booked successfully!');
            return redirect('booking_list');
        }
    }
    function bookingList(Request $req)
    {
        $user_id = $req->session()->get('user')['user_id'];
        if (Booking::where('booking_user_id', '=', $user_id)->exists()) {
            $booking_data = Booking::where('booking_user_id', '=', $user_id)->get();
            $res_id = $booking_data[0]->booking_res_id;
            $res = Resturant::where('res_id', '=', $res_id)->get();
            return view('booking_list', ['res' => $res[0], 'booking' => $booking_data[0]]);
        } else {
            return view('booking_list', ['msg' => 'No booking records found!']);
        }
    }
    function removeBooking(Request $req, $id)
    {
        Booking::where('booking_id', '=', $id)->delete();
        $req->session()->flash('status', 'Booking record deleted successfully');
        return redirect('booking_list');
    }
    function bookedUsers(Request $req)
    {
        if ($req->session()->get('user')['is_admin'] == 0) {
            $owner_id = $req->session()->get('user')['user_id'];
            $booked = Booking::where('booking_res_owner_id', '=', $owner_id)->get();
            $customer = [];
            foreach ($booked as $item) {
                $value = User::where('user_id', '=', $item->booking_user_id)->get();
                $customer[] = $value[0];
            }
            $res = [];
            foreach ($booked as $item) {
                $value = Resturant::where('res_id', '=', $item->booking_res_id)->get();
                $res[] = $value[0];
            }
            // return $customer;
            return view("booked_users", ['customers' => $customer, 'res' => $res, 'booking' => $booked]);
        }
        else{
            $booked = Booking::all();
            $res = Resturant::all();
            $customer = User::all();
            return view('booked_users', ['booked'=>$booked, 'res'=>$res, 'customers'=>$customer]);
        }
    }
    function resList(Request $req)
    {
        if($req->session()->get('user')['is_admin']==0){
            $owner_id = $req->session()->get('user')['user_id'];
            $res = Resturant::where('res_user_id', '=', $owner_id)->get();
            return view('res_list', ['res'=>$res]);
        }
        else{
            $res = Resturant::all();
            $users = User::all();
            return view('res_list', ['res'=>$res, 'users'=>$users]);
        }
    }
    function userList()
    {
        $user = User::all();
        return view('user_list', ['users'=>$user]);
    }
    function deleteUser(Request $req, $id){
        User::where('user_id', '=', $id)->delete();
        $req->session()->flash('status', 'User deleted successfully.');
        return redirect('user_list');
    }
    function deleteRes(Request $req, $id){
        Resturant::where('res_id', '=', $id)->delete();
        $req->session()->flash('status', 'Restaurent deleted successfully');
        return redirect('res_list');
    }
    function deleteBooking(Request $req, $id){
        Booking::where('booking_id', '=', $id)->delete();
        $req->session()->flash('status', 'Booking deleted successfully');
        return redirect('booked_users');
    }
    function editUser($id){
        $user = User::where('user_id', '=', $id)->get();
        return view('update_user', ['user'=>$user[0]]);
    }
    function updateUser(Request $req){
        $user = User::find($req->input('user_id'));
        $user->user_fname = $req->input('user_fname');
        $user->user_lname = $req->input('user_lname');
        $user->user_mail = $req->input('user_mail');
        $user->user_type = $req->input('user_type');
        $user->save();
        $req->session()->flash('status', 'User updated successfully');
        return redirect('user_list');
    }
    function editRes($id){
        $res = Resturant::where('res_id', '=', $id)->get();
        return view('update_res', ['res'=>$res[0]]);
    }
    function updateRes(Request $req){
        $res = Resturant::find($req->input('res_id'));
        $res->res_name = $req->input('res_name');
        $res->res_address = $req->input('res_address');
        $res->res_description = $req->input('res_description');
        $res->res_price = $req->input('res_price');
        if(!empty($req->file('res_banner'))){
            $res->res_image = $req->file('res_banner')->store('images');
        }
        $res->save();
        $req->session()->flash('status', 'Restaurent updated successfully');
        return redirect('res_list');
    }
    function updatePassword(Request $req){
        $user = User::where('user_mail','=',$req->input('user_mail'))->get();
        $user = User::find($user[0]->user_id);
        $user->user_password = Crypt::encrypt($req->input('new_pass'));
        // $user->user_password = $req->input('new_pass');
        $user->save();
        $req->session()->flash('Status', 'Password Updated');
        return redirect('login');
    }
}
