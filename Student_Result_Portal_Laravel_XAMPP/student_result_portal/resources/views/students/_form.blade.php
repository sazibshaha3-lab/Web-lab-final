<label for="name">Student Name</label>
<input id="name" name="name" value="{{ old('name', $student->name ?? '') }}" required>
@error('name')<div class="error">{{ $message }}</div>@enderror

<label for="roll">Roll</label>
<input id="roll" name="roll" value="{{ old('roll', $student->roll ?? '') }}" required>
@error('roll')<div class="error">{{ $message }}</div>@enderror

<label for="department">Department</label>
<input id="department" name="department" value="{{ old('department', $student->department ?? '') }}" required>
@error('department')<div class="error">{{ $message }}</div>@enderror

<label for="email">Email</label>
<input id="email" type="email" name="email" value="{{ old('email', $student->email ?? '') }}" required>
@error('email')<div class="error">{{ $message }}</div>@enderror
