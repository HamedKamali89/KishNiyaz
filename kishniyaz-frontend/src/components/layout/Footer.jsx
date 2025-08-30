import { Link } from 'react-router-dom';

function Footer() {
  return (
    <footer className="bg-gray-900 text-gray-300 mt-auto">
      <div className="container mx-auto px-4 py-8">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          {/* بخش معرفی */}
          <div>
            <h3 className="text-xl font-bold text-white mb-4">کیش نیاز</h3>
            <p className="text-sm">
              پلتفرم جامع خدمات در جزیره کیش. از رزرو هتل تا خدمات گردشگری، همه چیز در یک جا.
            </p>
          </div>

          {/* لینک‌های سریع */}
          <div>
            <h4 className="text-lg font-semibold text-white mb-4">دسترسی سریع</h4>
            <ul className="space-y-2">
              <li><Link to="/services" className="hover:text-white transition-colors">خدمات</Link></li>
              <li><Link to="/about" className="hover:text-white transition-colors">درباره ما</Link></li>
              <li><Link to="/contact" className="hover:text-white transition-colors">تماس با ما</Link></li>
              <li><Link to="/faq" className="hover:text-white transition-colors">سوالات متداول</Link></li>
            </ul>
          </div>

          {/* خدمات محبوب */}
          <div>
            <h4 className="text-lg font-semibold text-white mb-4">خدمات محبوب</h4>
            <ul className="space-y-2">
              <li><Link to="/services/hotels" className="hover:text-white transition-colors">رزرو هتل</Link></li>
              <li><Link to="/services/tours" className="hover:text-white transition-colors">تورهای گردشگری</Link></li>
              <li><Link to="/services/transport" className="hover:text-white transition-colors">حمل و نقل</Link></li>
              <li><Link to="/services/restaurants" className="hover:text-white transition-colors">رستوران‌ها</Link></li>
            </ul>
          </div>

          {/* اطلاعات تماس */}
          <div>
            <h4 className="text-lg font-semibold text-white mb-4">تماس با ما</h4>
            <ul className="space-y-2 text-sm">
              <li className="flex items-center">
                <span className="ml-2">📍</span>
                جزیره کیش، بلوار صدف
              </li>
              <li className="flex items-center">
                <span className="ml-2">📞</span>
                <a href="tel:+987644420000" className="hover:text-white">076-4442-0000</a>
              </li>
              <li className="flex items-center">
                <span className="ml-2">✉️</span>
                <a href="mailto:info@kishniyaz.com" className="hover:text-white">info@kishniyaz.com</a>
              </li>
            </ul>
          </div>
        </div>

        {/* کپی رایت */}
        <div className="border-t border-gray-800 mt-8 pt-8 text-center text-sm">
          <p>© 1403 کیش نیاز. تمامی حقوق محفوظ است.</p>
        </div>
      </div>
    </footer>
  );
}

export default Footer;
