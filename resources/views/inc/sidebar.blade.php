<style>
    .sidebar{
        margin: 10px 0;
        font-size: 15px;
    }
    .sidebar a{
        padding: 15px 15px;
    }
    .sidebar a .fa-long-arrow-right{
        float: right;
        margin-top: 3px;
    }
</style>

<div class="col-sm-4 col-md-3 sidebar">
    <div class="list-group">
        <a href="{{route('dashboard')}}" class="list-group-item {{ Route::is('dashboard') ? 'active' : '' }}">
            <i class="fa fa-tachometer" aria-hidden="true"></i> My Dashboard <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
        <a href="{{route('profile')}}" class="list-group-item {{ Route::is('profile') ? 'active' : '' }}">
            <i class="fa fa-user"></i> My Profile <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-cog"></i> My Account <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-inbox"></i> My Shipment <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-inbox"></i> Address book <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-dollar"></i> Billing & Payment <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-dollar"></i> Support Request <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
        <a href="#" class="list-group-item">
            <i class="fa fa-dollar"></i> Order Supplies <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</div>