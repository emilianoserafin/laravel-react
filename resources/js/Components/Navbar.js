import React from 'react';
import ResponsiveNavLink from './ResponsiveNavLink';
import ApplicationLogo from './ApplicationLogo';
import { Link } from '@inertiajs/inertia-react';

export default function Navbar(props) {
    const navClasses = 'flex pt-3 ' + props.className;
    return (
        <nav className={navClasses}>
            <Link href="/">
                <ApplicationLogo className="block h-9 w-auto text-gray-500 pl-5 pr-3" />
            </Link>
            <ResponsiveNavLink>Home</ResponsiveNavLink>
            <ResponsiveNavLink>Products</ResponsiveNavLink>
            <ResponsiveNavLink>Locations</ResponsiveNavLink>
            <ResponsiveNavLink>Farms</ResponsiveNavLink>
            {props.children}

        </nav>

    );
}
