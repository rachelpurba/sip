@extends('layouts.masterUmum')

@section('content')
	<h3 style="text-align: center">Daftar Berita Biofarmaka</h3>
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
                    <div style="display: inline-block;" class="dropdown" data-control-type="boot-sort-drop-down" data-control-name="bootstrap-sort-dropdown-demo" data-control-action="sort" data-datetime-format="{year}"> 
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
					@foreach($beritas as $berita)
					<div class="list-item" style="border-bottom: rgb(210, 214, 222) thin solid">
						<h4 class="title"><b>{{$berita->judul_berita}}</b></h4>
						{{ strip_tags(substr($berita->konten_berita, 0, 300)) }}... <a href="{{ route('berita.show', $berita->id)}}">Selengkapnya</a><br>
						<small class="date"><b>Diperbaharui pada :</b> {{ date('d/n/Y', strtotime($berita->updated_at)) }}</small>
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