@extends("layouts.app")
@include('components.config.edition')
@php
    // change key names
    $tablesCols = [
        'avatar_id' => ['img' , __('parametrage/ville.carte')],
        'id' => ['text' , __('parametrage/ville.nomAr')],
        'email' => ['text' , __('parametrage/ville.nomR')],
        'email_verified_at' => ['text' , __('parametrage/ville.pefecturesAr')],
        'remember_token' => ['text' , __('parametrage/ville.prefectures')]
        ];


@endphp



@section("wrapper")

            <x-group.bread-crumb :dash="true" :pages="$pages"/>
            <x-form.form method="post" :action="route('validate')" class="row" title='les information'>
                @csrf
                @bind($user)

                <x-form.file required name="avatar" label="logo"/>


                <div class="col-12 col-md-6">
                    <x-form.input :horizontal="false" readonly label="id"
                                  name="id"/>
                </div>

                <div class="col-12 col-md-6">
                    <x-form.input :horizontal="false" readonly label="username"
                                  name="username"/>
                </div>

                <div class="col-12 col-md-6">
                    <x-form.input :horizontal="false" required label="first name" name="first_name"/>
                </div>
                <div class="col-12 col-md-6">
                    <x-form.input :horizontal="false" required label="last name" name="last_name"/>
                </div>


                <div class="col-12 ">
                    <x-form.input-date required :horizontal="false" label="email_verified_at" name="email_verified_at"
                                       :picker-type="\App\View\Components\Form\InputDate::DATE"/>
                </div>
                <div class="col-12">
                    <x-form.text-area required :horizontal="false" maxlength="255" name="remember_token"
                                      label="remember_token"/>
                </div>
                <div class="mt-2"></div>


                <div class="col-6 ">
                    <x-form.select  name="juridifctionFk"  required
                                   :bind-with="[\App\Models\User::all(),['email' , 'last_name']]" label="dsqdsq"/>
                </div>
                <div class="col-6">
                    <x-form.select name="juridictionFk" required
                                   :bind-with="[\App\Models\User::all(),['id' , 'last_name']]" label="dsqdsq"/>
                </div>


                <div class="col-12">
                    <x-group.option-list required name="super_user" label="super user">
                        <x-form.radio name="super_users" label="validation" value="1" />
                        <x-form.radio name="super_users" label="validation" value="2" />
                    </x-group.option-list>
                </div>


                <div class="col-12">
                    <x-group.option-list required name="super_user" label="super user">

                        <x-form.check-box name="super_user" label="validation" value="1" :multi="true" />
                        <x-form.check-box name="super_user" label="validation" value="2" :multi="true" />
                    </x-group.option-list>
                </div>





                <div class="col-12">
                    <x-group.option-list required name="super_user" label="super user">
                        <x-form.radio
                            label="super user"
                            name="super_user"
                            :value="1"
                        />
                        <x-form.radio
                            label="user"
                            name="super_user"
                            :value="0"
                        />
                    </x-group.option-list>
                </div>


                <div class="col-12">
                    <x-group.option-list min="2" required name="super_user" label="super user">
                        <x-form.check-box
                            label="super user"
                            name="super_user"
                            :value="1"
                            :multi="true"
                        />
                        <x-form.check-box
                            label="user"
                            name="super_user"
                            :value="0"
                            :multi="true"
                        />
                        <x-form.check-box
                            label="user simple"
                            name="super_user"
                            :value="2"
                            :multi="true"
                        />
                        <x-form.check-box
                            label="user hight"
                            name="super_user"
                            :value="3"
                            :multi="true"
                        />



                    </x-group.option-list>
                </div>



                @endBinding
                <div class="col-12 my-3">
                    <input type="submit" class="btn btn-primary" value="save">
                </div>


            </x-form.form>



        {{--            @bind($users)--}}
        {{--            <x-form.data-table--}}
        {{--                id="villes"--}}
        {{--                title="sq"--}}
        {{--                :datatableColumns="$tablesCols"--}}
        {{--                primary-key="id"--}}
        {{--                edit-route="get.admin"--}}
        {{--                delete-route="delete.admin"--}}
        {{--            />--}}
        {{--            @endbinding--}}

@endsection


@push("plugin-scripts")


@endpush


