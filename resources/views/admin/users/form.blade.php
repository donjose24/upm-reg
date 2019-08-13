<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label for="first_name" class="control-label">{{ 'First Name' }}</label>
    <input type="text" class="form-control" rows="5" name="first_name" id="first_name" value="{{ isset($user->first_name) ? $user->first_name : ''}}">
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''}}">
    <label for="last_name" class="control-label">{{ 'Last Name' }}</label>
    <input class="form-control" rows="5" name="last_name" type="text" id="last_name" value="{{ isset($user->last_name) ? $user->last_name : ''}}">
    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('contact_number') ? 'has-error' : ''}}">
    <label for="contact_number" class="control-label">{{ 'Contact Number' }}</label>
    <input type="text" class="form-control" rows="5" name="contact_number" type="text" id="contact_number" value="{{ isset($user->contact_number) ? $user->contact_number : ''}}">
    {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('birthdate') ? 'has-error' : ''}}">
    <label for="birthdate" class="control-label">{{ 'Birthdate' }}</label>
    <input class="form-control" name="birthdate" type="date" id="birthdate" value="{{ isset($user->birthdate) ? $user->birthdate : ''}}" >
    {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('role') ? 'has-error' : ''}}">
    <label for="role" class="control-label">{{ 'Role' }}</label>
    <select class="form-control" name="rolw">
        <option value="admin">Administrator</option>
        <option value="normal">Applicant</option>
    </select>
    {!! $errors->first('role', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ice_name') ? 'has-error' : ''}}">
    <label for="ice_name" class="control-label">{{ 'Ice Name' }}</label>
    <textarea class="form-control" rows="5" name="ice_name" type="textarea" id="ice_name" >{{ isset($user->ice_name) ? $user->ice_name : ''}}</textarea>
    {!! $errors->first('ice_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ice_contact_number') ? 'has-error' : ''}}">
    <label for="ice_contact_number" class="control-label">{{ 'Ice Contact Number' }}</label>
    <input type="text" class="form-control" name="ice_contact_number" id="ice_contact_number" value="{{ isset($user->ice_contact_number) ? $user->ice_contact_number : ''}}">
    {!! $errors->first('ice_contact_number', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('full_address') ? 'has-error' : ''}}">
    <label for="full_address" class="control-label">{{ 'Full Address' }}</label>
    <textarea class="form-control" rows="5" name="full_address" type="textarea" id="full_address" >{{ isset($user->full_address) ? $user->full_address : ''}}</textarea>
    {!! $errors->first('full_address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('application_status') ? 'has-error' : ''}}">
    <label for="application_status" class="control-label">{{ 'Application Status' }}</label>
    <select name="application_status" class="form-control">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
    {!! $errors->first('application_status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
