<h1>Hi Simple User</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf <!-- This adds a CSRF token to protect against Cross-Site Request Forgery -->
        <button type="submit" class="dropdown-item text-danger">
            <i class="mdi mdi-power text-danger"></i> Logout
        </button>
    </form>