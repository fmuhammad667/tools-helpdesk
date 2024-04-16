<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\JenisParameter; // Parameter
use App\Models\JenisResult; // Result
use App\Models\Aplikasi; // Aplikasi
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $userCount = User::count();
        view()->share('userCount',$userCount);
        
        $RoleCount = Role::count();
        view()->share('RoleCount',$RoleCount);
        
        $PermissionCount = Permission::count();
        view()->share('PermissionCount',$PermissionCount);
        
        $CategoryCount = Category::count();
        view()->share('CategoryCount',$CategoryCount);
        
        $SubCategoryCount = SubCategory::count();
        view()->share('SubCategoryCount',$SubCategoryCount);
        
        $CollectionCount = Collection::count();
        view()->share('CollectionCount',$CollectionCount);
        
        $ProductCount = Product::count();
        view()->share('ProductCount',$ProductCount);

        // jenis parameter count
        $JenisParameterCount = JenisParameter::count();
        view()->share('JenisParameterCount',$JenisParameterCount);

        // jenis result count
        $JenisResultCount = JenisResult::count();
        view()->share('JenisResultCount',$JenisResultCount);

        $AplikasiCount = Aplikasi::count();
        view()->share('AplikasiCount',$AplikasiCount);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar');
    }
}
