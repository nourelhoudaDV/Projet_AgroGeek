@extends("layouts.app")
@include('components.config.edition')
@section("wrapper")

    <x-group.bread-crumb :dash="true" :pages="$data['pages']"   />
    <x-form.form
        method="post"
        :action="isset($model) ? route('update.admin' , $model['id']) : route('store.admin')" class="row"
        :title='isset($model) ? "modifier les informations"  : "add new admin" '>
    @bind($model ?? null)


        <x-form.file name="avatar" label="image" />

        <div class="col-12">
            <x-form.input :horizontal="true"   required label="name" name="name"/>
        </div>
        <div class="col-12">
            <x-form.input :horizontal="true"   required label="email" name="email"/>
        </div>


        <div class="col-12 ">
            <x-form.select name="role" required
                           :bind-with="[ \App\Models\Role::all() ,[ 'id' , 'role_name' ]]" label="is me"/>
        </div>


        <div class="col-12">
            <x-group.option-list required name="genre" label="le sexe">
                <x-form.radio name="genre" label="Home" value="H" />
                <x-form.radio name="genre" label="Femme" value='F' />
            </x-group.option-list>
        </div>




        <div class="col-12">
            <x-form.text-area :horizontal="true"   required label="password" name="password"/>
        </div>

        <div class="col-12">
            <x-form.input-date :picker-type="InputDate::DATE" :horizontal="true"   label="created at" name="created_at"/>
        </div>
        <div class="col-12">
            <x-form.input-date :picker-type="InputDate::DATE" :horizontal="true"   label="updated at" name="updated_at"/>
        </div>




        <div class="col-12">
            <x-group.option-list required min="3" name="role"  label="super user">
                <x-form.check-box :multi="true" name="role"  label="user"     value="1"  :show-error="false" />
                <x-form.check-box :multi="true" name="role" label="super user" value="2"  :show-error="false" />
                <x-form.check-box :multi="true" name="role" label="admin"        value="3"        :show-error="false" />
                <x-form.check-box :multi="true" name="role" label="super admin" value="4"  :show-error="false" />
                <x-form.check-box :multi="true" name="role" label="owner" value="5"  :show-error="false" />
            </x-group.option-list>
        </div>







        <div class="">
            <input class="btn btn-primary" type="submit" value="save">
        </div>



    @endBinding
    </x-form.form>
@endsection
