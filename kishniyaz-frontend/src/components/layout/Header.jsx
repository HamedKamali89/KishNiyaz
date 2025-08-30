import { useState } from 'react';
import { Link } from 'react-router-dom';

function Header() {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);

  return (
    <header className="kishniyaz-header sticky top-0 z-50">
      <div className="container mx-auto px-4">
        <nav className="flex items-center justify-between h-16">
          {/* لوگو */}
          <Link to="/" className="flex items-center space-x-reverse space-x-2">
            <span className="text-2xl font-bold">کیش نیاز</span>
          </Link>

          {/* منوی دسکتاپ */}
          <div className="hidden md:flex items-center space-x-reverse space-x-6">
            <Link to="/" className="hover:text-yellow-300 transition-colors">
              صفحه اصلی
            </Link>
            <Link to="/services" className="hover:text-yellow-300 transition-colors">
              خدمات
            </Link>
            <Link to="/about" className="hover:text-yellow-300 transition-colors">
              درباره ما
            </Link>
            <Link to="/contact" className="hover:text-yellow-300 transition-colors">
              تماس با ما
            </Link>
          </div>

          {/* دکمه‌های ورود/ثبت‌نام */}
          <div className="hidden md:flex items-center space-x-reverse space-x-4">
            <Link to="/login" className="btn btn-outline border-white text-white hover:bg-white hover:text-blue-600">
              ورود
            </Link>
            <Link to="/register" className="btn bg-yellow-400 text-gray-800 hover:bg-yellow-300">
              ثبت‌نام
            </Link>
          </div>

          {/* دکمه منوی موبایل */}
          <button
            onClick={() => setMobileMenuOpen(!mobileMenuOpen)}
            className="md:hidden text-white"
          >
            <svg className="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              {mobileMenuOpen ? (
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M6 18L18 6M6 6l12 12" />
              ) : (
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M4 6h16M4 12h16M4 18h16" />
              )}
            </svg>
          </button>
        </nav>

        {/* منوی موبایل */}
        {mobileMenuOpen && (
          <div className="md:hidden py-4 border-t border-white/20">
            <div className="flex flex-col space-y-3">
              <Link to="/" className="hover:text-yellow-300 transition-colors">
                صفحه اصلی
              </Link>
              <Link to="/services" className="hover:text-yellow-300 transition-colors">
                خدمات
              </Link>
              <Link to="/about" className="hover:text-yellow-300 transition-colors">
                درباره ما
              </Link>
              <Link to="/contact" className="hover:text-yellow-300 transition-colors">
                تماس با ما
              </Link>
              <hr className="border-white/20" />
              <Link to="/login" className="hover:text-yellow-300 transition-colors">
                ورود
              </Link>
              <Link to="/register" className="hover:text-yellow-300 transition-colors">
                ثبت‌نام
              </Link>
            </div>
          </div>
        )}
      </div>
    </header>
  );
}

export default Header;
