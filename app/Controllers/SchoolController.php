<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SchoolModel;
use App\Models\UserModel;

class SchoolController extends BaseController
{
    public function __construct()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login');
        }
    }

    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login');
        } else {
            $SchoolModel = new SchoolModel();

            $request = service('request');
            $searchData = $request->getGet();

            $search = "";
            if (isset($searchData) && isset($searchData['search'])) {
                $search = $searchData['search'];
            }

            if ($search == '') {
                $paginateData = $SchoolModel->paginate(5);
            } else {
                $paginateData = $SchoolModel->select('*')
                    ->orLike('name', $search)
                    ->orLike('location', $search)
                    ->paginate(5);
            }

            $data = [
                'SchoolModel' => $paginateData,
                'pager' => $SchoolModel->pager,
                'search' => $search
            ];

            return view('schools/index', $data);
        }
    }

    public function create()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login');
        } else {
            return view('schools/create');
        }
    }

    public function store()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login');
        } else {
            $request = service('request');
            $postData = $request->getPost();

            if (isset($postData['submit'])) {

                ## Validation
                $input = $this->validate([
                    'name' => 'required|min_length[3]',
                    'location' => 'required'
                ]);

                if (!$input) {
                    return redirect()->route('schools/create')->withInput()->with('validation', $this->validator);
                } else {

                    $SchoolModel = new SchoolModel();

                    $data = [
                        'name' => $postData['name'],
                        'location' => $postData['location']
                    ];

                    ## Insert Record
                    if ($SchoolModel->insert($data)) {
                        session()->setFlashdata('message', 'Added Successfully!');
                        session()->setFlashdata('alert-class', 'alert-success');

                        return redirect()->route('schools/create');
                    } else {
                        session()->setFlashdata('message', 'Data not saved!');
                        session()->setFlashdata('alert-class', 'alert-danger');

                        return redirect()->route('schools/create')->withInput();
                    }
                }
            }
        }
    }

    public function edit($id)
    {

        ## Select record by id
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login');
        } else {
            $SchoolModel = new SchoolModel();
            $school = $SchoolModel->find($id);

            $data['school'] = $school;
            return view('schools/edit', $data);
        }
    }

    public function update($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login');
        } else {
            $request = service('request');
            $postData = $request->getPost();

            if (isset($postData['submit'])) {

                ## Validation
                $input = $this->validate([
                    'name' => 'required|min_length[3]',
                    'location' => 'required'
                ]);

                if (!$input) {
                    return redirect()->route('schools/edit/' . $id)->withInput()->with('validation', $this->validator);
                } else {

                    $SchoolModel = new SchoolModel();

                    $data = [
                        'name' => $postData['name'],
                        'location' => $postData['location']
                    ];

                    ## Update record
                    if ($SchoolModel->update($id, $data)) {
                        session()->setFlashdata('message', 'Updated Successfully!');
                        session()->setFlashdata('alert-class', 'alert-success');

                        return redirect()->route('/');
                    } else {
                        session()->setFlashdata('message', 'Data not saved!');
                        session()->setFlashdata('alert-class', 'alert-danger');

                        return redirect()->route('schools/edit/' . $id)->withInput();
                    }
                }
            }
        }
    }

    public function delete($id)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()
                ->to('/login');
        } else {
            $SchoolModel = new SchoolModel();

            ## Check record
            if ($SchoolModel->find($id)) {


                ## Delete record
                $SchoolModel->delete($id);

                session()->setFlashdata('message', 'Deleted Successfully!');
                session()->setFlashdata('alert-class', 'alert-success');
            } else {
                session()->setFlashdata('message', 'Record not found!');
                session()->setFlashdata('alert-class', 'alert-danger');
            }

            return redirect()->route('profile');
        }
    }
}