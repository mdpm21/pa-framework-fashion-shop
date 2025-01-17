<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController3 extends Controller
{
    public function index()
    {
        // mengambil data dari table items
        $items = DB::table('items')->orderByDesc('updated_at')->paginate(10);
        return view('user.profile.index', [
            'items' => $items,
        ]);
    }

    public function show(string $id)
    {
        $users = DB::table('users')->get();
        return view('user.show',
            [
                'id' => $id,
                'users' => $users,
                'countPendingOrders' => OrderController::pendingOrders(),
            ]
        );
    }

    // edit products
    public function edit(string $id) {
        $user = DB::table('users')->where('id', $id)->first();

        return view('user.setting', [
            'user' => $user,
            'countPendingOrders' => OrderController::pendingOrders(),
        ]);
    }

    // update products
    public function update(Request $request) {
        if ($request->new_password || $request->confirm_new_password ) {
            if($request->new_password == $request->confirm_new_password){
                DB::table('users')->where('id', $request->id)->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->new_password),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);
                    return redirect('/update');
                } else{
                return redirect("/update/$request->id");
            }
        } else {
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            // return redirect('/admin/users');
            return redirect('/update');
        }
    }

    // public function delete(string $id)
	// {
	// 	$item = DB::table('users')->where('id', $id);
    //     $item->delete();
	// 	return redirect('/admin/users');
	// }
}
