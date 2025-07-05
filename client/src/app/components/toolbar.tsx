"use client";

import { useEffect, useState } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBars } from "@fortawesome/free-solid-svg-icons";

export default function Toolbar() {
    const [theme, setTheme] = useState("dark");

    useEffect(() => {
        if (theme === "dark") document.documentElement.classList.add("dark");
    }, []);

    const toggleTheme = () => {
        const newTheme = theme === "dark" ? "light" : "dark";
        setTheme(newTheme);
        document.documentElement.classList.toggle("dark");
    };

    return (
        <nav className="h-10 border-b-gray-300 border-b-1 px-2 dark:border-b-gray-800 dark:bg-transparent">
            <div className="max-w-5xl h-full mx-auto flex justify-between items-center">
                <section id="title" className="dark:text-white">
                    <a href="/" className="text-lg font-bold">
                        Codespace
                    </a>
                </section>

                <section id="links" className="flex gap-4">
                    <a
                        href="/"
                        className="dark:text-white font-bold hover:text-gray-500 dark:hover:text-gray-200"
                    >
                        Highlights
                    </a>

                    <a
                        href="/login"
                        className="text-gray-700 dark:text-gray-200 hover:text-gray-500"
                    >
                        Login
                    </a>
                </section>
                <section id="theme-toggle" className="flex items-center">
                    <button
                        className="text-gray-500 hover:text-gray-300 cursor-pointer"
                        onClick={toggleTheme}
                    >
                        {theme !== "dark" ? "🌞 Light Mode" : "🌙 Dark Mode"}
                    </button>
                </section>
                {/* <section
                    id="menu-toggle"
                    className="flex items-center sm:hidden"
                >
                    <button className="text-gray-500 hover:text-gray-300">
                        <FontAwesomeIcon icon={faBars} />
                    </button>
                </section> */}
            </div>
        </nav>
    );
}
