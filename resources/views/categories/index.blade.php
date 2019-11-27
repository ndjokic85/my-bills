
@foreach($billCategories as $category)
<div>
    <label>Name</label>{{ $category->name }}

</div>
<div>
    <label>Due day</label>{{ $category->due_day }}
</div>
@endforeach