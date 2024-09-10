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
                                <a href="{{ route('backend.pages.homepage.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.homepage.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.homepage.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Why we are different</td>
                            <td>
                                <a href="{{ route('backend.pages.why-we-are-different.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.why-we-are-different.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.why-we-are-different.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>History of GPNi</td>
                            <td>
                                <a href="{{ route('backend.pages.history-of-gpni.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.history-of-gpni.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.history-of-gpni.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Gift Card</td>
                            <td>
                                <a href="{{ route('backend.pages.gift-card.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.gift-card.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.gift-card.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Advisory Board</td>
                            <td>
                                <a href="{{ route('backend.pages.advisory-board.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.advisory-board.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.advisory-board.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>ISSN Partner</td>
                            <td>
                                <a href="{{ route('backend.pages.issn-partner.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.issn-partner.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.issn-partner.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>FAQ</td>
                            <td>
                                <a href="{{ route('backend.pages.faq.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.faq.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.faq.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>Policy</td>
                            <td>
                                <a href="{{ route('backend.pages.policy.index', 'english') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>English
                                </a>

                                <a href="{{ route('backend.pages.policy.index', 'chinese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Chinese
                                </a>

                                <a href="{{ route('backend.pages.policy.index', 'japanese') }}" title="Edit" class="ms-4">
                                    <i class="bi bi-pencil-square me-1"></i>Japanese
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection