@extends("layouts.app")
@include('components.config.edition')
@section("wrapper")
    <x-group.bread-crumb :dash="true" :pages="$data['pages']"/>
    <x-form.form method="post" :action="isset($model) ? route('update.user' , $model['id']) : route('store.user')"
                 class="row" title='les information'>
        @bind($model ?? null)
        @if(isset($message))
            @switch($message)
                @case('updated')
                <div class="badge badge-success">
                    a ete modifier avec success
                </div>
                @break

                @case('failed')
                <div class="badge badge-warning">
                    a non ete modifier avec success
                </div>
                @break

                @case('added')
                <div class="badge badge-success">
                    a ete ajoute avec success
                </div>
                @break
            @endswitch
        @endif

        <x-form.file required name="avatar" label="avatar"/>
        <div class="col-12">
            <x-form.input :horizontal="true" readonly required label="id" name="id"/>
        </div>

        <div class="col-12">
            <x-form.input :horizontal="true" required readonly label="username" name="username"/>
        </div>

        <div class="col-12">
            <x-form.input :horizontal="true" required label="first name" name="first_name"/>
        </div>

        <div class="col-12">
            <x-form.input :horizontal="true" required label="last name" name="last_name"/>
        </div>


        <div class="col-6 ">
            <x-form.input-date required :horizontal="true" label="email verified at" name="email_verified_at"
                               :picker-type="\App\View\Components\Form\InputDate::DATE"/>
        </div>
        <div class="col-6 ">
            <x-form.input-date required :horizontal="true" label="email verified at" name="email_verified_at"
                               :picker-type="\App\View\Components\Form\InputDate::TIME"/>
        </div>

        <div class="col-12">
            <x-form.text-area required :horizontal="true" maxlength="255" name="remember_token"
                              label="remember_token"/>
        </div>
        <div class="mt-2"></div>


        <div class="col-12 ">
            <x-form.select name="role" required
                           :bind-with="[\App\Models\Role::all(),['id' , 'role_name']]" label="is me"/>
        </div>

        <div class="col-12 ">
            <x-form.select name="role" required label="is me" :column="[
                       'F' => 'Femme',
                       'H' => 'Homme'
                ]"/>
        </div>


        <div class="col-12">
            <x-group.option-list required name="genre" label="le sexe">
                <x-form.radio name="genre" label="Home" value="H"/>
                <x-form.radio name="genre" label="Femme" value='F'/>
            </x-group.option-list>
        </div>


        <div class="col-12">
            <x-group.option-list required name="super_user" min="1" label="super user">
                <x-form.check-box name="super_user" label="user" value="0" :show-error="false"/>
                <x-form.check-box name="super_user" label="super user" value="1" :show-error="false"/>
                <x-form.check-box name="super_user" label="super admin" value="2" :show-error="false"/>
            </x-group.option-list>
        </div>


        @endBinding
        <div class="col-12 my-3">
            <input type="submit" class="btn btn-primary" value="save">
        </div>


    </x-form.form>
@endsection




