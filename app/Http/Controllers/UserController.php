<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  // Display all users
  public function index()
  {
      $users = User::all();
      return view('users.index', compact('users'));
  }

  // Show the form to change the password
  public function editPassword($id)
  {
      $user = User::findOrFail($id);

      // Check if the logged-in user is the admin
      if (Auth::user()->email === 'admin@orris.com' && Auth::check() && Hash::check('12345678', Auth::user()->password)) {
          return view('users.edit-password', compact('user'));
      }

      // Redirect if the user is not authorized
      return redirect()->route('users.index')->with('error', 'You are not authorized to edit passwords.');
  }

  // Update the password
  public function updatePassword(Request $request, $id)
  {
      $request->validate([
          'password' => 'required|string|min:8|confirmed',
      ]);

      $user = User::findOrFail($id);

      // Check if the logged-in user is the admin
      if (Auth::user()->email === 'admin@orris.com' && Auth::check() && Hash::check('12345678', Auth::user()->password)) {
          $user->password = Hash::make($request->password);
          $user->save();

          return redirect()->route('users.index')->with('success', 'Password updated successfully!');
      }

      // Redirect if the user is not authorized
      return redirect()->route('users.index')->with('error', 'You are not authorized to update passwords.');
  }
}
