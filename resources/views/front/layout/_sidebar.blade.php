<label for="menu-opener" role="button" class="open-menu-drawer"></label>
<input type="checkbox" data-menu id="menu-opener" hidden>
<aside class="menu-drawer">
    <div></div>
    <nav class="menu">

        <div>
            <a href="{{url('/')}}/showroom">Welcome Area<br>& Explore Magna Careers</a>
            <a href="{{url('/')}}/active-aerodynamics" {{$category === 'active-aerodynamics' ? 'class="active"' : ''}}>Active Aerodynamics</a>
            <a href="{{url('/')}}/advanced-driver">Advanced Driver Assistance Systems</a>
            <a href="{{url('/')}}/body-exteriors">Body Exteriors & Structures</a>
            <a href="{{url('/')}}/complete-vehicles">Complete Vehicles</a>
            <a href="{{url('/')}}/intelligent-lighting">Intelligent Lighting</a>
            <a href="{{url('/')}}/mechatronics">Mechatronics</a>
            <a href="{{url('/')}}/scalable-electrification">Scalable Electrification</a>
            <a href="{{url('/')}}/seat-of-the-future">Seat of the Future</a>
        </div>
    </nav>
    <label for="menu-opener" class="menu-overlay">
        <img src="{{url('/public/front')}}/img/close-blk.png">
    </label>
</aside>