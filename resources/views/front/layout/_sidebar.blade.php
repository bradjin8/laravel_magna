<label for="menu-opener" role="button" class="open-menu-drawer"></label>
<input type="checkbox" data-menu id="menu-opener" hidden>
<aside class="menu-drawer">
    <div></div>
    <nav class="menu">

        <div>
            <a href="{{url('/')}}/pano">Welcome Area<br>& Explore Magna Careers</a>
            <a href="{{url('/category')}}/active-aerodynamics" {{$category === 'active-aerodynamics' ? 'class="active"' : ''}}>Active Aerodynamics</a>
            <a href="{{url('/category')}}/advanced-driver">Advanced Driver Assistance Systems</a>
            <a href="{{url('/category')}}/body-exteriors">Body Exteriors & Structures</a>
            <a href="{{url('/category')}}/complete-vehicles">Complete Vehicles</a>
            <a href="{{url('/category')}}/intelligent-lighting">Intelligent Lighting</a>
            <a href="{{url('/category')}}/mechatronics">Mechatronics</a>
            <a href="{{url('/category')}}/scalable-electrification">Scalable Electrification</a>
            <a href="{{url('/category')}}/seat-of-the-future">Seat of the Future</a>
        </div>
    </nav>
    <label for="menu-opener" class="menu-overlay">
        <img src="{{url('/public/front')}}/img/close-blk.png">
    </label>
</aside>