<style>
.dropdown-menu {
    min-width: 280px !important;
    max-height: 400px !important;
    overflow-y: auto !important;
}

.dropdown-menu::-webkit-scrollbar {
    width: 6px;
}

.dropdown-menu::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.dropdown-menu::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

.dropdown-menu::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.notification-item {
    padding: 12px 16px;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s ease;
    flex-shrink: 0; 
    color: #101820 !important;
    cursor: pointer;
}

.notification-item:hover {
    background-color: #f8f9fa !important;
}

.notification-item:last-child {
    border-bottom: none;
}

.notification-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
}

.notification-title {
    font-weight: 600;
    color: #101820 !important;
    font-size: 13px;
    text-transform: uppercase;
}

.notification-time {
    font-size: 11px;
    color: #666 !important;
}

.notification-content {
    color: #101820 !important;
    font-size: 12px;
    line-height: 1.4;
}

.notification-badge {
    background-color: #dc3545;
    color: white;
    border-radius: 50%;
    width: 8px;
    height: 8px;
    display: inline-block;
    margin-right: 8px;
}

.notification-header-text {
    display: flex;
    align-items: center;
    color: #101820 !important;
    text-decoration: none !important;
    text-transform: uppercase !important;
    font-weight: 600;
    font-size: 13px;
    padding: 8px 16px;
    border-bottom: 1px solid #e9ecef;
    position: sticky;
    top: 0;
    background-color: #fcfcea;
    z-index: 1;
}
</style>

<div class="nav-item dropdown">
    <a class="nav-link" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown">
        <i class="fa-regular fa-bell"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fcfcea !important;">
        <li class="notification-header-text">
            <i class="fa-solid fa-bell" style="margin-right: 8px; color: #101820;"></i>
            Notifications
        </li>
        <li class="notification-item">
            <div class="notification-header">
                <span class="notification-title">
                    <span class="notification-badge"></span>
                    Price Drop Alert
                </span>
                <span class="notification-time">2h ago</span>
            </div>
            <div class="notification-content">
                Polo Ralph Lauren shirts are now 30% off! Limited time offer ends tomorrow.
            </div>
        </li>
        <li class="notification-item">
            <div class="notification-header">
                <span class="notification-title">
                    <span class="notification-badge"></span>
                    Raffle Winner
                </span>
                <span class="notification-time">1d ago</span>
            </div>
            <div class="notification-content">
                Congratulations! You won our monthly raffle. Check your email for prize details.
            </div>
        </li>
        <li class="notification-item">
            <div class="notification-header">
                <span class="notification-title">
                    <span class="notification-badge"></span>
                    New Arrival
                </span>
                <span class="notification-time">3d ago</span>
            </div>
            <div class="notification-content">
                Fresh collection of Nike Air Max shoes just arrived. Shop now before they're gone!
            </div>
        </li>
        <li class="notification-item">
            <div class="notification-header">
                <span class="notification-title">
                    <span class="notification-badge"></span>
                    Flash Sale
                </span>
                <span class="notification-time">5d ago</span>
            </div>
            <div class="notification-content">
                Flash sale on all summer collection items. Up to 50% off selected products!
            </div>
        </li>
    </ul>
</div>
