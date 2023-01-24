@extends('dashboard.include.logout')
@push('style')
    <style>
        .delete {
            cursor: pointer !important;
            font-size: 30px;
            position: absolute;
            color: white;
            border: none;
            background: none;
            right: -15px;
            top: -15px;
            line-height: 1;
            z-index: 99;
            padding: 0;
        }

        .delete span {
            height: 30px;
            width: 30px;
            background-color: black;
            border-radius: 50%;
            display: block;
        }

        .box {
            width: calc((100% - 30px) * 0.333);
            margin: 5px;
            height: 250px;
            background: #CCCCCC;
            float: left;
            box-sizing: border-box;
            position: relative;
            box-shadow: 0 0 5px 2px rgba(0, 0, 0, .15);
        }

        .box:hover {
            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.5);
        }

        .box .image {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .box .image img {
            width: 100%;
            min-height: 100%;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
        }

        @media (max-width: 600px) {
            .box {
                width: calc((100% - 20px) * 0.5);
                height: 200px;
            }
        }
    </style>
@endpush


@section('content')
    {{-- @if (session()->has('success')) --}}

    {{-- @endif --}}

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1"> الاعدادات العامة</h4>

                            </div><!-- end card header -->

                            <div class="card-body">

                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-borderless" role="alert">
                                        <strong>{{ session()->get('success') }}</strong>
                                    </div>
                                @endif
                                <div class="live-preview">
                                    <form action="{{ route('admin.setting') }}" class="row g-3" method="POST"
                                        enctype="multipart/form-data" >
                                        @csrf




                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label"> الايميل</label>
                                            <input type="text" value="{{ $Setting ? $Setting->email : '' }}"
                                                name="email" class="form-control" id="nameInput" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label"> رقم الجوال</label>
                                            <input type="text" value="{{ $Setting ? $Setting->phone : '' }}"
                                                name="phone" class="form-control" id="nameInput" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label"> العنوان </label>
                                            <input type="text" value="{{ $Setting ? $Setting->address : '' }}"
                                                name="address" class="form-control" id="nameInput" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label"> الدولة </label>
                                            <input type="text" value="{{ $Setting ? $Setting->country : '' }}"
                                                name="country" class="form-control" id="nameInput" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label"> ساعات العمل </label>
                                            <input type="text" value="{{ $Setting ? $Setting->hours : '' }}"
                                                name="hours" class="form-control" id="nameInput" />
                                        </div>


                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label">  الشعار </label>
                                            <input type="file"
                                                name="file" class="form-control" />

                                        </div>
                                        <div class="col-md-3" style="    background: #155bd5;">
                                            <img width="100%" src="{{ asset($Setting ? $Setting->logo : '') }}" width="50px" alt="">


                                        </div>



                                        <div class="row justify-content-center">
                                            <button style="    margin-top: 25px;width: 200px;" type="submit"
                                                class="btn btn-lg btn-success">حفظ</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">  القسم الرئيسي </h4>

                            </div><!-- end card header -->

                            <div class="card-body">


                                <div class="live-preview">
                                    <form action="{{ route('admin.Homeinformation') }}" class="row g-3" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf



                                        <div class="row">


                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label"> عنوان </label>
                                            <input type="text" value="{{ $Homeinformation ? $Homeinformation->title : '' }}"
                                                name="title" class="form-control" id="nameInput" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label">  رابط</label>
                                            <input type="text" value="{{ $Homeinformation ? $Homeinformation->link : '' }}"
                                                name="link" class="form-control" id="nameInput" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label">  وصف </label>
                                           <textarea name="content" class="form-control"  id="" cols="30" rows="10">
                                            {{ $Homeinformation ? $Homeinformation->content : '' }}
                                           </textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label">  صورة </label>
                                            <input type="file"
                                                name="file" class="form-control" />

                                        </div>
                                        <div class="col-md-3" style="">
                                            <img width="100%" src="{{ asset($Homeinformation ? $Homeinformation->image : '') }}" alt="">


                                        </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <button style="    margin-top: 25px;width: 200px;" type="submit"
                                                class="btn btn-lg btn-success">حفظ</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>




                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">  من نحن   </h4>

                            </div><!-- end card header -->

                            <div class="card-body">


                                <div class="live-preview">
                                    <form action="{{ route('admin.About') }}" class="row g-3" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">


                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label"> عنوان </label>
                                            <input type="text" value="{{ $About ? $About->title : '' }}"
                                                name="title" class="form-control" id="nameInput" />
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label">  صورة </label>
                                            <input type="file"
                                                name="file" class="form-control" />
                                               <img src="" alt="">
                                        </div>

                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label">  Who we are  </label>
                                           <textarea name="who" class="form-control"  id="" cols="30" rows="10">
                                            {{ $About ? $About->who : '' }}
                                           </textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label">  version  </label>
                                           <textarea name="version" class="form-control"  id="" cols="30" rows="10">
                                            {{ $About ? $About->version : '' }}
                                           </textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nameInput" class="form-label">  history  </label>
                                           <textarea name="history" class="form-control"  id="" cols="30" rows="10">
                                            {{ $About ? $About->history : '' }}
                                           </textarea>
                                        </div>

                                    </div>

                                        <div class="row justify-content-center">
                                            <button style="    margin-top: 25px;width: 200px;" type="submit"
                                                class="btn btn-lg btn-success">حفظ</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


        </div>
    @endsection
    @push('script')
        <script>
            // $("#div1").mouseenter(function() {
            //     var $div2 = $("#confirm");
            //     if ($div2.is(":visible")) { return; }
            //     $div2.show();
            //     setTimeout(function() {
            //         $div2.hide();
            //     }, 10000);
            // });

            setTimeout(function() {
                $("#div1").hide();
                setTimeout(function() {
                    $("#myDiv").show();
                }, 5000);
            }, 5000);
        </script>
    @endpush
