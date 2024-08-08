<aside class="sidebar-wrapper">
    <div class="iconmenu">
        <div class="nav-toggle-box">
            <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
        </div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboards">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#pills-dashboards" type="button"><i class="bi bi-house-door-fill"></i></button>
            </li>

        </ul>
    </div>
    <div class="textmenu">
        <div class="brand-logo">
            <img src="{{asset('adminAsset')}}/assets/images/brand-logo-2.png" width="140" alt=""/>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="pills-dashboards">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Dashboards</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
{{--                    <a href="{{route('partnerAdd')}}" class="list-group-item"><i class="bi bi-cart-plus"></i>Add Partner</a>--}}
{{--                    <a href="{{route('makeSale')}}" class="list-group-item"><i class="bi bi-wallet"></i>Sales</a>--}}
                    <a href="{{route('partnerHome')}}" class="list-group-item"><i class="bi bi-wallet"></i>Home </a>
                    <a href="{{route('partnerProfile')}}" class="list-group-item"><i class="bi bi-wallet"></i>Profile </a>
                    <a href="{{route('cngManage')}}" class="list-group-item"><i class="bi bi-wallet"></i>CNG Manage </a>
{{--                    <a href="{{route('customerProfile')}}" class="list-group-item"><i class="bi bi-wallet"></i>Customer </a>--}}
{{--                    <a href="{{route('saleManage')}}" class="list-group-item"><i class="bi bi-wallet"></i>Cng Manage </a>--}}
                </div>
            </div>
        </div>
    </div>
</aside>
