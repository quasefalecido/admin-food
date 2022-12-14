<?php

namespace App\Http\Controllers\Andes\ACL;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePermission;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
  protected $repository;

  public function __construct(Permission $permission)
  {
    $this->repository = $permission;

    // $this->middleware(['can:permissions']);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $permissions = $this->repository->paginate();

    return view('andes.pages.permissions.index', compact('permissions'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('andes.pages.permissions.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreUpdatePermission  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreUpdatePermission $request)
  {
    $this->repository->create($request->all());

    return redirect()->route('permissions.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    if (!$permission = $this->repository->find($id)) {
      return redirect()->back();
    }

    return view('andes.pages.permissions.show', compact('permission'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    if (!$permission = $this->repository->find($id)) {
      return redirect()->back();
    }

    return view('andes.pages.permissions.edit', compact('permission'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\StoreUpdatePermission  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(StoreUpdatePermission $request, $id)
  {
    if (!$permission = $this->repository->find($id)) {
      return redirect()->back();
    }

    $permission->update($request->all());

    return redirect()->route('permissions.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    if (!$permission = $this->repository->find($id)) {
      return redirect()->back();
    }

    $permission->delete();

    return redirect()->route('permissions.index');
  }

  /**
   * Search results
   *
   * @param  Request $request
   * @return \Illuminate\Http\Response
   */
  public function search(Request $request)
  {
    $filters = $request->only('filter');

    $permissions = $this->repository
      ->where(function ($query) use ($request) {
        if ($request->filter) {
          $query->where('name', $request->filter);
          $query->orWhere('description', 'LIKE', "%{$request->filter}%");
        }
      })
      ->paginate();

    return view('andes.pages.permissions.index', compact('permissions', 'filters'));
  }
}
