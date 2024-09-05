<x-page
    title="System component Profile"
    :sectionMenu="[
        'Sections' => [
            ['url' => '#make', 'label' => 'Make'],
            ['url' => '#default-avatar', 'label' => 'Default avatar'],
        ]
    ]"
>

<x-sub-title id="make">Make</x-sub-title>

<x-p>
    The system component <em>Profile</em>  is used to display information about an authorized user in
    <strong>MoonShine</strong>.
</x-p>

<x-p>
    You can create a <em>Profile</em> using the static method <code>make()</code>
    class <code>Profile</code>.
</x-p>

<x-code language="php">
make(
    ?string $route = null,
    ?string $logOutRoute = null,
    Closure|false|null|string $avatar = null,
    Closure|null|string $nameOfUser = null,
    Closure|null|string $username = null,
    bool $withBorder = false,
    ?string $guard = null
)
</x-code>

<x-ul>
    <li><code>$route</code> - profile page route,</li>
    <li><code>$logOutRoute</code> - route for logout</li>
    <li><code>$avatar</code> - user avatar</li>
    <li><code>$nameOfUser</code> - user name</li>
    <li><code>$username</code> - username (email|login|tel ...),</li>
    <li><code>$withBorder</code> - split before the component</li>
    <li><code>$guard</code> - used by <em>Guard</em> for user authorization.</li>
</x-ul>

<x-code language="php">
namespace App\MoonShine;

use MoonShine\Components\Layout\LayoutBlock;
use MoonShine\Components\Layout\LayoutBuilder;
use MoonShine\Components\Layout\Menu;
use MoonShine\Components\Layout\Profile; // [tl! focus]
use MoonShine\Components\Layout\Sidebar;
use MoonShine\Contracts\MoonShineLayoutContract;

final class MoonShineLayout implements MoonShineLayoutContract
{
    public static function build(): LayoutBuilder
    {
        return LayoutBuilder::make([
            Sidebar::make([
                Menu::make()->customAttributes(['class' => 'mt-2']),
                Profile::make(withBorder: true) // [tl! focus]
            ]),

            //...
        ]);
    }
}
</x-code>

<x-image theme="light" src="{{ asset('screenshots/profile.png') }}"></x-image>
<x-image theme="dark" src="{{ asset('screenshots/profile_dark.png') }}"></x-image>

<x-sub-title id="default-avatar">Default avatar</x-sub-title>

<x-p>
    The <code>defaultAvatar()</code> method allows you to override the default profile avatar.
</x-p>

<x-code language="php">
defaultAvatar(string $url)
</x-code>

<x-ul>
    <li><code>$url</code> - default avatar url.</li>
</x-ul>

<x-code language="php">
use MoonShine\Components\Layout\Profile;

//...

Profile::make()
    ->defaultAvatar("https://ui-avatars.com/api/?name=$name") // [tl! focus]
</x-code>

</x-page>
