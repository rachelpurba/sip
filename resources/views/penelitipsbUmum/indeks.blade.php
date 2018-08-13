@extends('layouts.masterUmum')

@section('content')
	<h3 style="text-align: center">Daftar Peneliti Biofarmaka</h3>
	<div id="demo">
		<div class="panel panel-default">
	        <div class="panel-heading">
		        <div align="center">
		        	<ul class="list-inline" style="margin:0 auto;">
		            	<li class="title">Indeks</li>
				  		<li><a href="{{url('penelitipsb')}}">Semua</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'A')}}">A</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'B')}}">B</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'C')}}">C</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'D')}}">D</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'E')}}">E</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'F')}}">F</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'G')}}">G</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'H')}}">H</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'I')}}">I</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'J')}}">J</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'K')}}">K</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'L')}}">L</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'M')}}">M</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'N')}}">N</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'O')}}">O</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'P')}}">P</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'Q')}}">Q</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'R')}}">R</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'S')}}">S</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'T')}}">T</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'U')}}">U</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'V')}}">V</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'W')}}">W</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'X')}}">X</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'Y')}}">Y</a></li>
				  		<li><a href="{{ route('penelitipsb.indeks', 'Z')}}">Z</a></li>
					</ul>
		        </div>
				<div class="jplist-panel">
				    <div style="display: inline-block;" class="dropdown jplist-items-per-page" data-control-type="boot-items-per-page-dropdown" data-control-name="paging" data-control-action="paging">
	                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="dropdown-menu-1" aria-expanded="true">
	                        <span data-type="selected-text">Items per Page</span>
	                        <span class="caret"></span>
	                    </button>
	                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdown-menu-1">
	                        <li role="presentation">
	                            <a role="menuitem" tabindex="-1" href="#" data-number="10">10 per page</a>
	                        </li>
	                        <li role="presentation">
	                            <a role="menuitem" tabindex="-1" href="#" data-number="20" data-default="true">20 per page</a>
	                        </li>
	                        <li role="presentation">
	                            <a role="menuitem" tabindex="-1" href="#" data-number="40">40 per page</a>
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
				            <a role="menuitem" tabindex="-1" href="#" data-path=".nama" data-order="asc" data-type="text" data-default="true">Nama asc</a>
				         </li>
				         <li role="presentation">
				            <a role="menuitem" tabindex="-1" href="#" data-path=".nama" data-order="desc" data-type="text" data-default="true">Nama desc</a>
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
					@foreach($penelitipsbs as $penelitipsb)
					<div class="list-item" style="border-bottom: rgb(210, 214, 222) thin solid">
						<a href="{{ route('penelitipsb.show', $penelitipsb->id_pegawai)}}"><h4 class="nama">{{ $penelitipsb->pegawai->nama }}</h4></a>
						<p>{{ $penelitipsb->pegawai->jabatan }}</p>
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