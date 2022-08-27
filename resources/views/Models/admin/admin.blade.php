@extends('layouts.app')

@section('content')
<div class="container">
  <div>
    <a href="all_soldiers"><button class="btn btn-outline-warning btn-sm" type="button">Soldiers</button></a>
    <a href="all_tanks"><button class="btn btn-outline-warning btn-sm">Tanks</button></a>
    <a href="all_documents"><button class="btn btn-outline-warning btn-sm">Documents</button></a>
    <a href="addUser">
      <button class="btn btn-warning btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/></svg>
      </button>
    </a>
  </div>
  <div class="box_01">
    <svg class="box_02"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><g data-name="Builder"><path d="M38 32.7V40a8.37 8.37 0 0 1-4.4 7.37l-1.6.86-1.6-.86A8.37 8.37 0 0 1 26 40v-7.29a8.991 8.991 0 0 0 12-.01z" style="fill:#eac2b9"/><path d="M50.875 44.418C47.176 42.864 49.741 43.943 38 39a8.37 8.37 0 0 1-4.4 7.37l-1.6.86-1.6-.86A8.37 8.37 0 0 1 26 39c-11.741 4.943-9.176 3.864-12.875 5.418A10 10 0 0 0 7 53.629v8.621a.75.75 0 0 0 .75.75h48.5a.75.75 0 0 0 .75-.75v-8.621a10 10 0 0 0-6.125-9.211z" style="fill:#494a59"/><path d="M38 39a8.37 8.37 0 0 1-4.4 7.37l-1.6.86-1.6-.86A8.37 8.37 0 0 1 26 39l-10 4.21V63h32V43.21z" style="fill:#ea972a"/><path d="M35 3.42V1.75a.75.75 0 0 0-.75-.75h-4.5a.75.75 0 0 0-.75.75v1.67A10.985 10.985 0 0 0 21 14v2h22v-2a10.985 10.985 0 0 0-8-10.58z" style="fill:#ffb64d"/><path style="fill:#343544" d="M20 18h4v6h-4zM40 18h4v6h-4z"/><path d="M44 23h-4l-.516 7H44a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2zM24 23h-4a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h4.516z" style="fill:#eac2b9"/><path d="M48 43.21V63H25v-9.61a4 4 0 0 1 2.1-3.52l4.9-2.64 1.6-.86A8.37 8.37 0 0 0 38 39z" style="fill:#ffb64d"/><path d="M23 18v9a9 9 0 0 0 9 9 9 9 0 0 0 9-9v-9z" style="fill:#ffddd4"/><path d="M44 15H20a2 2 0 0 0 0 4h24a2 2 0 0 0 0-4zM25 54h23v6H25z" style="fill:#ea972a"/><path style="fill:#ce6f19" d="M16 54h9v6h-9z"/><path d="M40.75 7.34V12a.75.75 0 0 1-1.5 0V5.74a9.908 9.908 0 0 1 1.5 1.6zM24.75 5.74V12a.75.75 0 0 1-1.5 0V7.34a9.908 9.908 0 0 1 1.5-1.6zM28.25 9.75A.75.75 0 0 0 29 9V3.42a10.824 10.824 0 0 0-1.5.55V9a.75.75 0 0 0 .75.75zM35.75 9.75A.75.75 0 0 0 36.5 9V3.97a10.824 10.824 0 0 0-1.5-.55V9a.75.75 0 0 0 .75.75z" style="fill:#ea972a"/></g></svg></svg>
  </div>
</div>
@endsection