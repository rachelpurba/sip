@extends('layouts.masterUmum')
@section('content')
	<h3 style="text-align: center">Daftar {{$tipekegiatan->nama_tipe_kegiatan}}</h3>
	<div id="demo">
		<div class="panel panel-default">
		    <div class="panel-heading">
				<div class="jplist-panel">
				    <div style="display: inline-block;" class="dropdown jplist-items-per-page" data-control-type="boot-items-per-page-dropdown" data-control-name="paging" data-control-action="paging">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="dropdown-menu-1" aria-expanded="true">
                            <span data-type="selected-text">Items per Page</span>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-1">
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#" data-number="5">5 per page</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#" data-number="10" data-default="true">10 per page</a>
                            </li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#" data-number="20">20 per page</a>
                            </li>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation">
                                <a role="menuitem" tabindex="-1" href="#" data-number="all">View All</a>
                            </li>
                        </ul>
                    </div>
                    <div style="display: inline-block;" class="dropdown" data-control-type="boot-sort-drop-down" data-control-name="bootstrap-sort-dropdown-demo" data-control-action="sort" data-datetime-format="{year}-{month}-{day}"> 
				        <button class="btn btn-primary dropdown-toggle" type="button" id="sort-by-dropdown-btn" data-toggle="dropdown" aria-expanded="true">					
				         <span data-type="selected-text">Sort by</span>
				         <span class="caret"></span>						
				        </button>
				        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				         <li role="presentation">
				            <a role="menuitem" tabindex="-1" href="#" data-path=".title" data-order="asc" data-type="text">Nama asc</a>
				         </li>
				         <li role="presentation">
				            <a role="menuitem" tabindex="-1" href="#" data-path=".title" data-order="desc" data-type="text">Nama desc</a>
				         </li>
				         <li role="presentation">
						    <a role="menuitem" tabindex="-1" href="#" data-path=".date" data-order="asc" data-type="datetime">Tanggal asc</a>
				         </li>
				         <li role="presentation">
						    <a role="menuitem" tabindex="-1" href="#" data-path=".date" data-order="desc" data-type="datetime" data-default="true">Tanggal desc</a>
				         </li>
				        </ul>
				    </div>  
				   	<div style="display: inline-block;" class="text-filter-box pull-right">
					   <input 
						  data-path="*" 
						  type="text" 
						  value="" 
						  placeholder="Search..." 
						  data-control-type="textbox" 
						  data-control-name="title-filter" 
						  data-control-action="filter"
					   />
					</div>  			
                    <div class="jplist-pagination-info" data-type="<strong>Page {current} of {pages}</strong><br/> <small>{start} - {end} of {all}</small>" data-control-type="pagination-info" data-control-name="paging" data-control-action="paging"></div>	
		        </div>
		    </div>
		    <div class="panel-body">
		    	<div class="list">
					@foreach($kegiatans as $kegiatan)
					<div class="list-item" style="border-bottom: rgb(210, 214, 222) thin solid">
						<h4 class="title"><b>{{$kegiatan->nama_kegiatan}}</b></h4>
						<ul class="list-inline">
							Peneliti Biofarmaka:
						@foreach($kegiatan->penelitipsb as $penelitipsb)
							<li><a href="{{ route('penelitipsb.show', $penelitipsb->id_pegawai)}}">{{$penelitipsb->pegawai->nama}}</a></li>
						@endforeach
						</ul>
						<ul class="list-inline">
							Peneliti Non Biofarmaka:
						@foreach($kegiatan->penelitinonpsb as $penelitinonpsb)
							<li><a href="{{ route('penelitinonpsb.show', $penelitinonpsb->id_peneliti)}}">{{$penelitinonpsb->nama_peneliti}}</a></li>
						@endforeach
						</ul>
						<p class="date" align="right">{{ date('d F Y', strtotime($kegiatan->tanggal_awal)) }}</p>
					</div>
					@endforeach
		    	</div>
		    	<div class="jplist-panel">
			    	<ul
	                    class="pagination pull-right jplist-pagination"
	                    data-control-type="boot-pagination"
	                    data-control-name="paging"
	                    data-control-action="paging"
	                    data-range="3"
	                    data-mode="google-like">
	     			</ul>
	     		</div>
		  	</div>
		</div>
	</div>
@endsection