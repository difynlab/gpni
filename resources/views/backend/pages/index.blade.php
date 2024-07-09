@extends('backend.layouts.app')

@section('title', 'Pages')

@section('content')

    <x-backend.breadcrumb page_name="Pages"></x-backend.breadcrumb>
        
    <div class="static-pages">
        <div class="row">
            <div class="col-12">
                <p class="table-title">Pages</p>
                <p class="table-sub-title">All the list of pages</p>
                <table class="table w-100 table-borderless">
                    <tbody>
                        <tr>
                            <td>Home Page</td>
                            <td>
                                <a href="{{ route('backend.pages.homepage.index') }}" title="Edit"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Why we are different</td>
                            <td>
                                <a href="{{ route('backend.pages.why-we-are-different.index') }}" title="Edit"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <td>History of GPNi</td>
                            <td>
                                <a href="{{ route('backend.pages.history-of-gpni.index') }}" title="Edit"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection