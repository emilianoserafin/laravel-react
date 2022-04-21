import React from 'react';
import { Link, Head } from '@inertiajs/inertia-react';
import Navbar from '@/Components/Navbar';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink';

export default function Welcome(props) {
    return (
        <>
            <Head title="Welcome" />

                <Navbar className='justify-start'>
                    <div className='flex ml-auto pr-3'>
                    {props.auth.user ? (
                        <ResponsiveNavLink href={route('dashboard')} className="text-sm text-gray-700 underline">
                            Dashboard
                        </ResponsiveNavLink>
                    ) : (
                        <>
                            <ResponsiveNavLink href={route('login')} className="text-sm text-gray-700 underline">
                                Log-in
                            </ResponsiveNavLink>

                            <ResponsiveNavLink href={route('register')} className="ml-4 text-sm text-gray-700 underline">
                                Register
                            </ResponsiveNavLink>
                        </>
                    )}
                    </div>

                </Navbar>

        </>
    );
}
