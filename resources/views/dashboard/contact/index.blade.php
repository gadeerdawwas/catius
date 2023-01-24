@extends('dashboard.include.logout')

@push('style')
    <script src="{{ asset('dashboard/assets/js/layout.js') }}"></script>
@endpush
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">الطلبات </h4>



                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">الطلبات </h4>
                            </div><!-- end card header -->
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-borderless" role="alert">
                                    <strong>{{ session()->get('success') }}</strong>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger alert-borderless" role="alert">
                                    <strong>{{ session()->get('error') }}</strong>
                                </div>
                            @endif
                            <div class="card-body">
                                <div id="customerList">
                                    <div class="row g-4 mb-3">


                                    </div>

                                    <div class="table-responsive table-card mt-3 mb-1">
                                        <table class="table align-middle table-nowrap" id="customerTable">
                                            <thead class="table-light">
                                                <tr>
                                                    <th scope="col" style="width: 50px;">
                                                        #
                                                    </th>

                                                    <th class="sort" data-sort="action"> الاسم </th>
                                                    <th class="sort" data-sort="action"> الايميل </th>
                                                    <th class="sort" data-sort="action"> العنوان </th>
                                                    <th class="sort" data-sort="action"> الموضوع </th>
                                                    <th class="sort" data-sort="action"> رقم الجوال </th>
                                                    <th class="sort" data-sort="action"> المشاهدة </th>
                                                    <th class="sort" data-sort="action"> العمليات </th>
                                                </tr>
                                            </thead>

                                            <tbody class="list form-check-all">
                                                @foreach ($contacts as $contact)
                                                    <tr>

                                                        <td class="id"> {{ $loop->iteration }}</td>
                                                        <td class="name_ar">{{ $contact->name }}</td>
                                                        <td class="name_en">{{ $contact->email }}</td>
                                                        <td class="name_en">{{ $contact->title }}</td>
                                                        <td class="name_en">{{ $contact->phone }}</td>
                                                        <td class="name_en">{{ $contact->message }}</td>
                                                        <td class="name_en">


                                                            @if ($contact->state == 0)
                                                            <i style="color: rgb(253, 8, 20)" class="fa-regular fa-eye-slash"></i>
                                                            @else
                                                            <i style="color: rgb(20, 134, 45)" class="fa-regular fa-eye"></i>
                                                            @endif
                                                        </td>





                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <div class="edit">
                                                                    <button class="btn btn-sm btn-success edit-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#editModal{{ $contact->id }}">مشاهدة</button>
                                                                </div>

                                                                <div class="remove">
                                                                    <button class="btn btn-sm btn-danger remove-item-btn"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#deleteRecordModal{{ $contact->id }}">حذف</button>
                                                                </div>
                                                            </div>
                                                        </td>


                                                        <div class="modal fade" id="editModal{{ $contact->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-light p-3">
                                                                        <h5 class="modal-title" id="exampleModalLabel">تعديل
                                                                            الطلبات </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close"
                                                                            id="close-modal"></button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('admin.contactsupdate', $contact->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf

                                                                        <div class="modal-body">


                                                                            <div class="mt-2 text-center">

                                                                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                                    <h4>هل انت متاكد من عملية المشاهدة ؟ </h4>
                                                                                </div>
                                                                            </div>




                                                                        </div>





                                                                        <div class="modal-footer">
                                                                            <div class="hstack gap-2 justify-content-end">
                                                                                <button type="button" class="btn btn-light"
                                                                                    data-bs-dismiss="modal">إغلاق</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-success" id="add-btn">
                                                                                    نعم</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="modal fade zoomIn"
                                                            id="deleteRecordModal{{ $contact->id }}" tabindex="-1"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal" aria-label="Close"
                                                                            id="btn-close"></button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('admin.contactsdestroy', $contact->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                    
                                                                        <div class="modal-body">


                                                                            <div class="mt-2 text-center">
                                                                                <lord-icon
                                                                                    src="https://cdn.lordicon.com/gsqxdxog.json"
                                                                                    trigger="loop"
                                                                                    colors="primary:#f7b84b,secondary:#f06548"
                                                                                    style="width:100px;height:100px">
                                                                                </lord-icon>
                                                                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                                                                    <h4>هل انت متاكد من عملية الحذف ؟ </h4>
                                                                                </div>
                                                                            </div>




                                                                        </div>




                                                                        <div class="modal-footer">
                                                                            <div class="hstack gap-2 justify-content-end">
                                                                                <button type="button"
                                                                                    class="btn btn-light"
                                                                                    data-bs-dismiss="modal">إغلاق</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-success"
                                                                                    id="add-btn">
                                                                                    حذف</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>

                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <div class="pagination-wrap hstack gap-2">
                                            <div class="dataTables_paginate paging_bootstrap_full_number"
                                                id="sample_1_paginate">

                                                {!! $contacts->withQueryString()->links('pagination::bootstrap-4') !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->




            </div>
            <!-- Modal -->

            <!--end modal -->

        </div>


        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    </div>
@endsection

@push('script')
    <script src="{{ asset('dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/list.js/list.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ asset('dashboard/assets/js/pages/listjs.init.js') }}"></script>
@endpush
