<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $email = $request->input('email');
//        $email = $request->email;
        $pass = md5($request->input('password'));

//        $results = DB::select('select * from tbl_users where email = :email', ['email' => $email]);
        $results = DB::table('tbl_users')
            ->where('email', $email)
            ->where('password', $pass)
            ->first();

        if ($results != false) {
            return redirect('/dashboard');
        } else {
            return redirect('/')->with('loginMsg', 'Username or Password did not matched !!');
        }
    }

    /*
     * Role
     */

    public function addRole(Request $request)
    {
        $role_name = $request->name;
        $role_code = $request->code;
        $role_status = $request->status;

        $results = DB::insert('insert into role(name, code, status) values (?, ?, ?)', [$role_name, $role_code, $role_status]);

        if ($results != false) {
            return redirect('/addrole')->with('roleSccssMsg', 'Role Added Successfully.');
        } else {
            return redirect('/addrole')->with('roleErrMsg', 'Role add to failed!!');
        }
    }

    public function roleList()
    {
        $result = DB::select('select * from role');
        return view('admin.role.role', compact('result'));
    }

    public function editRole($id)
    {
        $results = DB::table('role')->where('id', $id)->first();
        return view('admin.role.updaterole', compact('results'));
    }

    public function updateRole(Request $request, $id)
    {
        $roleName = $request->name;
        $roleCode = $request->code;

        $results = DB::update('update role set name = ?, code = ? where id = ? ', [$roleName, $roleCode, $id]);

        if ($results != false) {
            return redirect('/role')->with('updateRoleMsg', 'Role Updated Successfully');
        } else {
            return redirect('/updaterole/' . $id)->with('errUpdateRoleMsg', 'Error! Role not updated.');
        }
    }

    public function deleteRole($id)
    {
        $resutls = DB::delete('delete from role where id = ?', [$id]);

        if ($resutls != false) {
            return redirect('/role')->with('deleteRoleMsg', 'Role item deleted successfully');
        } else {
            return redirect('/role')->with('errDeleteRoleMsg', 'Error!! Role item not deleted');
        }
    }

    /*
     * Users & Registration
     */

    public function showRegistration()
    {
        $results = DB::select('select * from role');
        return view('admin.users.registration', ['roles' => $results]);
    }

    public function registration(Request $request)
    {
        $name = $request->name;
        $cell = $request->cell;
        $email = $request->email;
        $role = $request->role;
        $address = $request->address;

        $results = DB::insert('insert into registration(name, cell, email, address, roleid) values (?, ?, ?, ?, ?)', [$name, $cell, $email, $address, $role]);

        if ($results != false) {
            return redirect('/registration')->with('regScsMsg', 'Registration Successful');
        } else {
            return redirect('/registration')->with('regErrMsg', 'Registration Failed!!');
        }
    }

    public function userList()
    {
        $result = DB::table('registration')
            ->join('role', 'registration.roleid', '=', 'role.id')
            ->select('registration.*', 'role.name as rolename')
            ->get();
//        dd($result);
        return view('admin.users.userlist', compact('result'));
    }

    public function editUser($id)
    {
        $userData = DB::table('registration')->where('id', $id)->first();
        $roleData = DB::select('select * from role');
        return view('admin.users.updateuser', ['userData' => $userData, 'roleData' => $roleData]);

    }

    public function updateUser(Request $request, $id)
    {
        $name = $request->name;
        $cell = $request->cell;
        $email = $request->email;
        $role = $request->role;
        $address = $request->address;

        $result = DB::update('update registration set name = ?, cell = ?, email = ?, address = ?, roleid = ? where id = ?', [$name, $cell, $email, $address, $role, $id]);

        if ($result != false) {
            return redirect('/users')->with('updateUserMsg', 'User Information Updated Successfully');
        } else {
            return redirect('/updateuser/' . $id)->with('errUpdateUserMsg', 'Error! User Information not updated.');
        }
    }

    public function deleteUser($id)
    {
        $userData = DB::delete('delete from registration where id = ?', [$id]);
        if ($userData != false) {
            return redirect('/users')->with('deleteUserMsg', 'User deleted successfully');
        } else {
            return redirect('/users')->with('errDeleteUserMsg', 'Error!! User not deleted');
        }
    }

    /*
     * Stock In
     */

    public function showStockIn()
    {
        $results = DB::select('select * from registration');
        return view('admin.stockin.stockin', ['registration' => $results]);
    }

    public function stockIn(Request $request)
    {
        $supid = $request->supname;
        $lotname = $request->lotname;
        $coil = $request->coil;
        $note = $request->note;
        $tweight = $request->tweight;
        $rent = $request->rent;
        $totalrent = $request->totalrent;
        $truck = $request->truck;

//        $user = DB::table('registration')->where('id', $supid)->first();
//        $supname = $user->name;

        $results = DB::insert('insert into stockin(supid, lotname, coil, note, tweight, rent, totalrent, truck) values (?, ?, ?, ?, ?, ?, ?, ?)', [$supid, $lotname, $coil, $note, $tweight, $rent, $totalrent, $truck]);

        if ($results != false) {
            return redirect('/stockin')->with('stockScsMsg', 'StockIn information save Successfully');
//            $id = DB::getPdo()->lastInsertId();
//            echo $id;
//            return redirect('/invoice/' . $id);
        } else {
            return redirect('/stockin')->with('stockErrMsg', 'StockIn information save to Failed!!');
        }

    }

    public function stockInList()
    {
        $result = DB::table('stockin')
            ->join('registration', 'stockin.supid', '=', 'registration.id')
            ->select('stockin.*', 'registration.name')
            ->get();
        return view('admin.stockin.stockinlist', compact('result'));
    }

    public function editStockIn($id)
    {
        $stockInData = DB::table('stockin')->where('id', $id)->first();
        $suppliersData = DB::select('select * from registration');

        return view('admin.stockin.updatestockin', ['stcInData' => $stockInData, 'suppData' => $suppliersData]);
    }

    public function updateStockIn(Request $request, $id)
    {
        $suppid = $request->supname;
        $lotName = $request->lotname;
        $noOfCoil = $request->coil;
        $note = $request->note;
        $totaWeight = $request->tweight;
        $rentPerTon = $request->rent;
        $totalRent = $request->totalrent;
        $noOfTruck = $request->truck;

        $result = DB::update('update stockin set supid = ?, lotname = ?, coil = ?, note = ?, tweight = ?, rent = ?, totalrent = ?, truck = ? where id = ?', [$suppid, $lotName, $noOfCoil, $note, $totaWeight, $rentPerTon, $totalRent, $noOfTruck, $id]);

        if ($result != false) {
            return redirect('/stockinlist')->with('updateStockInMsg', 'StockIn Updated Successfully');
        } else {
            return redirect('/updatestockin/' . $id)->with('errUpdateStockInMsg', 'Error! StockIn not updated.');
        }
    }

    public function deleteStockIn($id)
    {
        $data = DB::delete('delete from stockin where id = ?', [$id]);

        if ($data != false) {
            return redirect('/stockinlist')->with('deleteStockInMsg', 'StockIn item deleted successfully');
        } else {
            return redirect('/stockinlist')->with('errDeleteStockInMsg', 'Error!! StockIn item not deleted');
        }
    }

    /*
     * Stockout
     */

    public function showStockOut()
    {
        $suppliers = DB::table('registration')->get();
        $selltype = DB::table('sell')->get();
        return view('admin.stockout.stockout', ['suppliers' => $suppliers, 'selltype' => $selltype]);
    }

    public function getLot($id)
    {
        $lotname = DB::table("stockin")->where("supid", $id)->pluck("lotname", "id");
        return json_encode($lotname);
    }

    public function getTypeCost($id)
    {
        $getcost = DB::table('sell')->where('id', $id)->pluck("sellingCost", "id");
        return json_encode($getcost);
    }

    public function stockOut(Request $request)
    {
        $supid = $request->supname;
        $lotid = $request->lotname;
        $lotnumber = $request->lotnumber;
        $selltype = $request->selltype;
        $typecost = $request->typecost;
        $tweight = $request->tweight;
        $totalcost = $request->totalcost;

        $results = DB::insert('insert into stockout(supid, lotid, lotnumber, selltype, typecost, tweight, totalcost) values (?, ?, ?, ?, ?, ?, ?)', [$supid, $lotid, $lotnumber, $selltype, $typecost, $tweight, $totalcost]);

        if ($results != false) {
            return redirect('/stockout')->with('stockOutScsMsg', 'StockOut information save Successfully');
//            $id = DB::getPdo()->lastInsertId();
//            echo $id;
//            return redirect('/invoice/' . $id);
        } else {
            return redirect('/stockout')->with('stockOutErrMsg', 'StockOut information save to Failed!!');
        }

    }

    public function stockOutList()
    {
        $result = DB::table('stockout')
            ->join('registration', 'stockout.supid', '=', 'registration.id')
            ->join('stockin', 'stockout.lotid', '=', 'stockin.id')
            ->join('sell', 'stockout.selltype', '=', 'sell.id')
            ->select('stockout.*', 'registration.name as suppname', 'stockin.lotname', 'sell.sellingType', 'sell.sellingCost')
            ->get();
        return view('admin.stockout.stockoutlist', compact('result'));
    }

    public function editStockOut($id)
    {
        $stockOutData = DB::table('stockout')->where('id', $id)->first();
//        $suppliersData = DB::select('select * from registration');
        $suppliersData = DB::table('registration')->get();
        $suppId = $stockOutData->supid;
        $stockInData = DB::table('stockin')->where('supid', $suppId)->get();
        $sellData = DB::table('sell')->get();

        return view('admin.stockout.updatestockout', ['stcOutData' => $stockOutData, 'suppData' => $suppliersData, 'stcInData' => $stockInData, 'sellData' => $sellData]);
    }

    public function updateStockOut(Request $request, $id)
    {
        $supid = $request->supname;
        $lotid = $request->lotname;
        $lotnumber = $request->lotnumber;
        $selltype = $request->selltype;
        $typecost = $request->typecost;
        $tweight = $request->tweight;
        $totalcost = $request->totalcost;

        $result = DB::update('update stockout set supid = ?, lotid = ?, lotnumber = ?, selltype = ?, typecost = ?, tweight = ?, totalcost = ? where id = ?', [$supid, $lotid, $lotnumber, $selltype, $typecost, $tweight, $totalcost, $id]);

        if ($result != false) {
            return redirect('/stockoutlist')->with('updateStockOutMsg', 'StockOut Updated Successfully');
        } else {
            return redirect('/updatestockout/' . $id)->with('errUpdateStockOutMsg', 'Error! StockOut not updated.');
        }
    }

    public function deletestockout($id)
    {
        $data = DB::delete('delete from stockout where id = ?', [$id]);

        if ($data != false) {
            return redirect('/stockoutlist')->with('deleteStockOutMsg', 'StockOut item deleted successfully');
        } else {
            return redirect('/stockoutlist')->with('errDeleteStockOutMsg', 'Error!! StockOut item not deleted');
        }
    }


    /*
     * Invoice
     */

    public function invoice($id)
    {
        $data = DB::table('stockin')->where('id', $id)->first();

//        return view('admin.invoice.invoice', compact('data'));
        $pdf = PDF::loadView('admin.invoice.invoice', compact('data'));
        return $pdf->stream('invoice.pdf');
//        return $pdf->download('invoice.pdf');
    }
}
