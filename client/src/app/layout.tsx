import type { Metadata } from "next";
import "./globals.css";
import Toolbar from "./components/toolbar";

export const metadata: Metadata = {
    title: "Codespace",
    description:
        "A vibrant community platform for developers to share thoughts, ideas, and bugs, fostering open discussions and collaborative engagement.",
};

export default function RootLayout({
    children,
}: Readonly<{
    children: React.ReactNode;
}>) {
    return (
        <html lang="en">
            <body className="h-screen bg-amber-50 dark:bg-black">
                <Toolbar />
                {children}
            </body>
        </html>
    );
}
