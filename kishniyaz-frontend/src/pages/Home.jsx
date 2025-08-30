// src/pages/Home.jsx
import { useState } from 'react';
import { Link } from 'react-router-dom';
import { FaPlus, FaHome, FaWrench, FaUserMd, FaCar, FaLaptop, FaTshirt } from 'react-icons/fa';
import { motion } from 'framer-motion';

function Home() {
  const [selectedCategory, setSelectedCategory] = useState('');
  
  const categories = [
    { id: 1, title: 'خدمات منزل', icon: FaHome, count: 152, color: 'bg-blue-500' },
    { id: 2, title: 'تعمیرات', icon: FaWrench, count: 98, color: 'bg-green-500' },
    { id: 3, title: 'سلامت و زیبایی', icon: FaUserMd, count: 75, color: 'bg-purple-500' },
    { id: 4, title: 'حمل و نقل', icon: FaCar, count: 45, color: 'bg-yellow-500' },
    { id: 5, title: 'خدمات دیجیتال', icon: FaLaptop, count: 32, color: 'bg-red-500' },
    { id: 6, title: 'پوشاک و مد', icon: FaTshirt, count: 28, color: 'bg-pink-500' },
  ];

  const recentRequests = [
    { id: 1, title: 'نیاز به برقکار برای تعمیر کولر', category: 'تعمیرات', time: '2 ساعت پیش', proposals: 5 },
    { id: 2, title: 'نظافت منزل 120 متری', category: 'خدمات منزل', time: '3 ساعت پیش', proposals: 8 },
    { id: 3, title: 'آرایشگر برای عروسی', category: 'زیبایی', time: '5 ساعت پیش', proposals: 12 },
  ];

  return (
    <div>
      {/* Hero Section - ثبت درخواست */}
      <section className="bg-gradient-to-br from-blue-600 to-purple-700 text-white py-16">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto text-center">
            <motion.h1 
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              className="text-4xl md:text-5xl font-bold mb-4"
            >
              خدمات مورد نیازتون رو رایگان ثبت کنید
            </motion.h1>
            <motion.p 
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 0.1 }}
              className="text-xl mb-8"
            >
              بهترین پیشنهادات رو از ارائه‌دهندگان معتبر دریافت کنید
            </motion.p>
            
            {/* فرم ساده ثبت درخواست */}
            <motion.div 
              initial={{ opacity: 0, y: 20 }}
              animate={{ opacity: 1, y: 0 }}
              transition={{ delay: 0.2 }}
              className="bg-white rounded-lg shadow-xl p-6 text-gray-800"
            >
              <div className="grid md:grid-cols-2 gap-4 mb-4">
                <div>
                  <label className="block text-sm font-medium mb-2">به چه خدمتی نیاز دارید؟</label>
                  <select 
                    className="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500"
                    value={selectedCategory}
                    onChange={(e) => setSelectedCategory(e.target.value)}
                  >
                    <option value="">انتخاب کنید...</option>
                    {categories.map(cat => (
                      <option key={cat.id} value={cat.id}>{cat.title}</option>
                    ))}
                  </select>
                </div>
                <div>
                  <label className="block text-sm font-medium mb-2">شماره تماس</label>
                  <input 
                    type="tel" 
                    placeholder="09123456789"
                    className="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500"
                  />
                </div>
              </div>
              
              <Link 
                to="/request/new"
                className="inline-flex items-center gap-2 bg-orange-500 text-white px-8 py-3 rounded-lg hover:bg-orange-600 transition-colors"
              >
                <FaPlus />
                ادامه ثبت درخواست
              </Link>
            </motion.div>
          </div>
        </div>
      </section>

      {/* دسته‌بندی خدمات */}
      <section className="py-16">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl font-bold text-center mb-12">دسته‌بندی خدمات</h2>
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            {categories.map((category, index) => (
              <motion.div
                key={category.id}
                initial={{ opacity: 0, scale: 0.9 }}
                animate={{ opacity: 1, scale: 1 }}
                transition={{ delay: index * 0.1 }}
                whileHover={{ scale: 1.05 }}
                className="bg-white rounded-lg shadow-lg p-6 text-center cursor-pointer hover:shadow-xl transition-shadow"
              >
                <div className={`${category.color} text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl mx-auto mb-4`}>
                  <category.icon />
                </div>
                <h3 className="font-bold mb-1">{category.title}</h3>
                <p className="text-sm text-gray-600">{category.count} ارائه‌دهنده</p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* چطور کار می‌کنه */}
      <section className="bg-gray-50 py-16">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl font-bold text-center mb-12">چطور کار می‌کنه؟</h2>
          <div className="grid md:grid-cols-4 gap-8">
            <div className="text-center">
              <div className="bg-blue-100 text-blue-600 w-20 h-20 rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                ۱
              </div>
              <h3 className="font-bold mb-2">ثبت درخواست</h3>
              <p className="text-gray-600">نیازتون رو با جزئیات ثبت کنید</p>
            </div>
            <div className="text-center">
              <div className="bg-green-100 text-green-600 w-20 h-20 rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                ۲
              </div>
              <h3 className="font-bold mb-2">دریافت پیشنهاد</h3>
              <p className="text-gray-600">از ارائه‌دهندگان معتبر پیشنهاد بگیرید</p>
            </div>
            <div className="text-center">
              <div className="bg-purple-100 text-purple-600 w-20 h-20 rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                ۳
              </div>
              <h3 className="font-bold mb-2">انتخاب بهترین</h3>
              <p className="text-gray-600">پیشنهادات رو مقایسه و انتخاب کنید</p>
            </div>
            <div className="text-center">
              <div className="bg-orange-100 text-orange-600 w-20 h-20 rounded-full flex items-center justify-center text-3xl font-bold mx-auto mb-4">
                ۴
              </div>
              <h3 className="font-bold mb-2">دریافت خدمت</h3>
              <p className="text-gray-600">خدمت با کیفیت دریافت کنید</p>
            </div>
          </div>
        </div>
      </section>

      {/* آخرین درخواست‌ها */}
      <section className="py-16">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl font-bold text-center mb-12">آخرین درخواست‌های ثبت شده</h2>
          <div className="max-w-4xl mx-auto space-y-4">
            {recentRequests.map(request => (
              <motion.div 
                key={request.id}
                whileHover={{ scale: 1.02 }}
                className="bg-white rounded-lg shadow p-6 flex items-center justify-between"
              >
                <div>
                  <h3 className="font-bold text-lg mb-1">{request.title}</h3>
                  <div className="flex items-center gap-4 text-sm text-gray-600">
                    <span>دسته: {request.category}</span>
                    <span>•</span>
                    <span>{request.time}</span>
                    <span>•</span>
                    <span className="text-green-600 font-medium">{request.proposals} پیشنهاد</span>
                  </div>
                </div>
                <Link 
                  to={`/request/${request.id}`}
                  className="text-blue-600 hover:text-blue-800 font-medium"
                >
                  مشاهده جزئیات ←
                </Link>
              </motion.div>
            ))}
          </div>
          <div className="text-center mt-8">
            <Link 
              to="/requests"
              className="text-blue-600 hover:text-blue-800 font-medium"
            >
              مشاهده همه درخواست‌ها ←
            </Link>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="bg-gradient-to-r from-orange-500 to-red-500 text-white py-16">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-3xl font-bold mb-4">ارائه‌دهنده خدمات هستید؟</h2>
          <p className="text-xl mb-8">همین حالا ثبت‌نام کنید و به هزاران مشتری دسترسی پیدا کنید</p>
          <Link 
            to="/provider/register"
            className="bg-white text-orange-500 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition-colors inline-block"
          >
            ثبت‌نام ارائه‌دهندگان
          </Link>
        </div>
      </section>
    </div>
  );
}

export default Home;
