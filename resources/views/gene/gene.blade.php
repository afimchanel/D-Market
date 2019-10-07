@extends('layouts.app')

<style>
        /*#region Organizational Chart*/
        .tree * {
            margin: 7px;

            padding: 0;
        }

        .tree ul {
            
            padding-top: 10px;
            position: relative;

            - transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li {
            
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;

            -transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        /*We will use ::before and ::after to draw the connectors*/

        .tree li::before,
        .tree li::after {
            content: 'เส้นแม่';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 2px solid #696969;
            width: 50%;
            height: 10px;
        }

        .tree li::after {
            content: 'เส้นพ่อ';
            right: auto;
            left: 50%;
            border-left: 2px solid #696969;
        }

        /*We need to remove left-right connectors from elements without 
    any siblings*/
        .tree li:only-child::after,
        .tree li:only-child::before {
            display: none;
        }

        /*Remove space from the top of single children*/
        .tree li:only-child {
            padding-top: 0;
        }

        /*Remove left connector from first child and 
    right connector from last child*/
        .tree li:first-child::before,
        .tree li:last-child::after {
            content: 'เส้น0';
            border: 0 none;
        }

        /*Adding back the vertical connector to the last nodes*/
        .tree li:last-child::before {
            border-right: 2px solid #696969;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }

        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        /*Time to add downward connectors from parents*/
        .tree ul ul::before {
            content: 'ลูก';
            position: absolute;
            
            top: 0;
            left: 50%;
            border-left: 2px solid #696969;
            width: 0;
            height: 20px;
        }

        .tree li a {
            content: '';
            height: 100px;
            width: 200px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: white;
            color: #8b8b8b;
            font-family: arial, verdana, tahoma;
            font-size: 11px;
            display: inline-block;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);

            -transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        /*Time for some hover effects*/
        /*We will apply the hover effect the the lineage of the element also*/
        .tree li a:hover,
        .tree li a:hover li a {
            background: #cbcbcb;
            color: #000;
        }

        /*Connector styles on hover*/
        .tree li a:hover+ul li::after,
        .tree li a:hover+ul li::before,
        .tree li a:hover+ul::before,
        .tree li a:hover+ul ul::before {
            border-color: #94a0b4;
        }

        /*#endregion*/
        }
</style>

@section('content')
<?php 
use App\Dog;


?>
<div class="container-fluid" style="margin-top:20px">
    <h1>รุ่นสุนัข.</h1>
    <div class="row">
        <div class="">
            <div class="tree">
                
                        <ul>
                            <li><?php  $faher = Dog::where('idthedog',$dogs->id_father)->first();  ?>

                                @if ($faher == NULL || $faher->id_father == NULL)
                                    <a>
                                        <div class="container-fluid">
                                            <div class="row">
                                                    ไม่พบข้อมูลปู
                                                <img src="/img/M.jpg/" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                            </div>
                                        </div>
                                    </a>
                                @else
                                <a href="/view/dog/breed/{{$faher->id_father}}">
                                        <div class="container-fluid">
                                            <div class="row">
                                                {{$faher->father}}
                                                <img src="/img/M.jpg/" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                <ul>
                                    <li>
                                        

                                        @if ($faher == NULL)
                                            <a>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        {{$dogs->father}}
                                                        <img src="" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                                    </div>
                                                </div>                                                
                                            </a>
                                        @else
                                        <a href="/view/dog/breed/{{$dogs->id_father}}">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        {{$dogs->father}}
                                                        <img src="/storage/public/imagecover/{{$faher->image}}" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                                    </div>
                                                </div>                                                
                                            </a>
                                        @endif
                                        <ul>
                                            <li>
                                                <a href="/view/dog/breed/{{$dogs->idthedog}}">
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            {{$dogs->namedog}}
                                                            <img src="/storage/public/imagecover/{{$dogs->image}}" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                                        </div>
                                                    </div>
                                                </a>

                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <li>
                                        <?php  $momher = Dog::where('idthedog',$dogs->id_momher)->first();  ?>

                                        @if ($momher == NULL)
                                            <a>
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        {{$dogs->momher}}
                                                        <img src="" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                                    </div>
                                                </div>
                                            </a>
                                        @else
                                            <a href="/view/dog/breed/{{$dogs->id_momher}}">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        {{$dogs->momher}}
                                                        <img src="/storage/public/imagecover/{{$momher->image}}" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                                    </div>
                                                </div>
                                            </a>
                                        @endif

                                    </li>
                                </ul>
                            </li>
                            <li>
                                @if ($faher == NULL || $faher->id_momher == NULL)
                                    <a >
                                        <div class="container-fluid">
                                            <div class="row">
                                                ไม่พบข้อมูลย่า
                                                <img src="/img/M.jpg/" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                            </div>
                                        </div>
                                    </a>
                                @else
                                    <a ">
                                        <div class="container-fluid">
                                            <div class="row">
                                                
                                                <img src="/img/M.jpg/" style="width:70px; height:70px;" class="css-class" alt="alt text">
                                            </div>
                                        </div>
                                    </a>
                                @endif
                                
                            </li>
                        </ul>
                        
                   
            </div>
        </div>
    </div>
</div>
@endsection