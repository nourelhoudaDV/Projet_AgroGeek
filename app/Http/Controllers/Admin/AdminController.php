<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\services\errors\UiMessage;
use App\services\security\ValidationRules;
use ConnectedAdmin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{


    public function index()
    {
        $data = [
            'pages' => [
                [
                    'name' => 'les admins',
                    'url' => route('admins'),
                    'icon' => 'lni lni-alarm-clock',
                ]
            ],
            'tablesCols' => [
                // colName    type    title
                'avatar' => ['img', 'avatar'],
                'cin' => ['text', 'cin'],
                'nom' => ['text', 'nom'],
                'prenom' => ['text', 'prenom'],
                'genre' => ['text', 'genre'],
                'typeProprietaire' => ['text', 'type de Proprietaire'],
                'gsm_one' => ['text', 'gsm premier'],
                'gsm_two' => ['text', 'gsm deuxieme'],
                'email' => ['text', 'email'],
                'siteweb' => ['text', 'site web'],
                'dateCreation' => ['text', 'date de creation'],
                'observations' => ['text', 'observations'],
                'description' => ['text', 'description']
            ],

            'collection' => Admin::query()
                ->with('updatedBy')
                ->where(Admin::PK, '!=', ConnectedAdmin::get()[Admin::PK])
                ->get()
        ];


        return view('UserManagement.admin.super-admin.consult', compact('data'));


    }

    public function delete($id)
    {
        $o = Admin::query()->find($id);

        if (isset($o)) {
            $o->delete();
            $return = [1, 2];
        } else
            $return = [0];
        return back()->with('message', $return);
    }


    public function create()
    {
        $data = [
            'pages' => [
                [
                    'name' => 'admins',
                    'url' => route('admins'),
                    'icon' => 'lni lni-users',
                ],
                [
                    'name' => 'ajoute nouveau admin',
                    'url' => true,
                    'icon' => 'lni lni-circle-plus',
                ],
            ],
        ];
        return view('UserManagement.admin.super-admin.create', compact('data'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'nom' => 'required|string|max:150',
            'prenom' => 'required|string|max:150',
            'dateNaissance' => 'nullable|date',
            'genre' => 'required|string|max:2|' . Rule::in(['H', 'F']),
            'gsm' => 'nullable|string|max:15|regex:' . ValidationRules::PHONE_NUMBER_REGEX,
            'email' => 'required|string|max:255|email|unique:useradmins',
            'description' => 'nullable|string|max:255',
            'fonction' => 'nullable|string|max:150',
            'role' => 'required|string|max:3|' . Rule::in(['A', 'SA', 'LA']),
            'adminStatus' => 'required|string|max:3|' . Rule::in(['A', 'D', 'B']),
            'generated-password' => 'required|string|max:255'
        ]);
        if (isset($validated['generated-password'])) {
            $validated['pswrd'] = $validated['generated-password'];
            $validated['generated-password'] = 'Y';
        }

        unset($validated['generated-password']);

        $validated['createdBy'] = ConnectedAdmin::get()[Admin::PK]; // this will be Auth::guard('admin')['id']
//        $validated['dateLastUpdate'] = now()->toDateTimeString();
        $validated['dateCreation'] = now()->toDateTimeString();
//        $validated['lastUpdateBy'] = ConnectedAdmin::get()[Admin::PK];

        Admin::query()->create($validated);
        return redirect()->route('admins')->with('message', [1, 0]);
    }


    public function show($id)
    {
        $admin = Admin::query()->find($id);

        if (isset($admin)) {
            return view('UserManagement.admin.super-admin.edit', compact('admin'));
        }
        return redirect()->route('admins')->with('message', [0]);
    }

    public function status($id, $status)
    {
        $admin = Admin::query()->find($id);
        $statusValid = in_array($status, ['A', 'D', 'B']);

        if (isset($admin) && $statusValid && $admin['adminStatus'] !== $status) {
            $admin->update([
                'adminStatus' => $status
            ]);
            return redirect()->route('admins')->with('message', [1, 1]);

        }

        return redirect()->route('admins')->with('message', [0]);

    }

    public function rule($id, $rule)
    {
        $admin = Admin::query()->find($id);
        $statusValid = in_array($rule, ['A', 'SA', 'LA']);


        if (isset($admin) && $statusValid && $admin['role'] != $rule) {
            $admin->update([
                'role' => $rule
            ]);
            return redirect()->route('admins')->with('message', [1, 1]);
        }

        return redirect()->route('admins')->with('message', [0]);

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "nom" => "nullable|string",
            "prenom" => "nullable|string",
            "genre" => 'nullable|string|max:2|' . Rule::in(['H', 'F']),
            "gsm" =>
                [
                    'nullable',
                    'string',
                    'max:15',
                    'regex:' . ValidationRules::PHONE_NUMBER_REGEX,
                    function ($attribute, $value, $fail) use ($id) {
                        $o = Admin::query()
                            ->where(Admin::PK, '!=', $id)
                            ->where('gsm', $value)
                            ->first();

                        if (isset($o)) {
                            $fail(__('validation.unique', ['attribute' => $attribute]));
                        }
                    }
                ],
            "email" => [
                "required",
                "string",
                "max:255",
                "email",
                function ($attribute, $value, $fail) use ($id) {
                    $o = Admin::query()
                        ->where(Admin::PK, '!=', $id)
                        ->where('email', $value)
                        ->first();

                    if (isset($o)) {
                        $fail(__('validation.unique', ['attribute' => $attribute]));
                    }
                }
            ]
            ,
            "description" => "nullable|string",
            "fonction" => "nullable|string"
        ]);

        $validated['lastUpdateBy'] = ConnectedAdmin::get()[Admin::PK];
        $validated['dateLastUpdate'] = now()->toDateTimeString();
        Admin::query()->find($id)->update($validated);


        return redirect(route('admins'))->with('message', [1, 1]);
    }


}
