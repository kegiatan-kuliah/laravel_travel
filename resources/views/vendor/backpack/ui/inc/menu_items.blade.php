{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Customers" icon="la la-user" :link="backpack_url('customer')" />
<x-backpack::menu-item title="Cars" icon="la la-car" :link="backpack_url('car')" />
<x-backpack::menu-item title="Drivers" icon="la la-certificate" :link="backpack_url('driver')" />
<x-backpack::menu-item title="Bookings" icon="la la-clipboard" :link="backpack_url('booking')" />
<x-backpack::menu-item title="Payments" icon="la la-money" :link="backpack_url('payment')" />