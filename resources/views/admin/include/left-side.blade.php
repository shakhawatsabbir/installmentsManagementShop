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
            <div class="tab-pane fade active show" id="pills-dashboards">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Dashboards</h5>
                        </div>
                        <small class="mb-0">Some placeholder content</small>
                    </div>
                    <a href="{{route('dashboard')}}" class="list-group-item"><i class="bi bi-cart-plus"></i>Dashboard</a>
                    <a href="{{route('product.create')}}" class="list-group-item"><i class="bi bi-cart-plus"></i>Product Add</a>
                    <a href="{{route('category.index')}}" class="list-group-item"><i class="bi bi-wallet"></i>Category Manage</a>
                    <a href="{{route('product.index')}}" class="list-group-item"><i class="bi bi-wallet"></i>Product Manage </a>
                    <a href="{{route('makeSale')}}" class="list-group-item"><i class="bi bi-wallet"></i>Sales Add</a>
                    <a href="{{route('saleManage')}}" class="list-group-item"><i class="bi bi-wallet"></i>Sales Manage </a>
                    <a href="{{route('makeInstallment')}}" class="list-group-item"><i class="bi bi-wallet"></i>Instalment Pay </a>
                    <a href="{{route('customer')}}" class="list-group-item"><i class="bi bi-wallet"></i>Customer Manage</a>
                    <a href="{{route('instalmentCustomerManaage')}}" class="list-group-item"><i class="bi bi-wallet"></i>Installment Customer</a>
                </div>
            </div>
        </div>
    </div>
</aside>
