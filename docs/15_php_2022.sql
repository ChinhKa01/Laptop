-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 11, 2022 lúc 05:14 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `15_php_2022`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'laptop'),
(2, 'smartwatch'),
(3, 'mobile'),
(4, 'tablet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `address`, `image`) VALUES
(1, 'Apple', 'USA', ''),
(2, 'Samsung', 'Korea', ''),
(3, 'Xiaomi', 'China', ''),
(4, 'Dell', 'USA', ''),
(5, 'ASUS', 'China', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_receiver` varchar(255) NOT NULL,
  `phone_receiver` varchar(255) NOT NULL,
  `address_receiver` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_method` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `name_receiver`, `phone_receiver`, `address_receiver`, `notes`, `status`, `total_price`, `created_at`, `payment_method`) VALUES
(72, 70, 'chính', '0327726001', 'hải tân', '', 'Đã duyệt', 151000000, '2022-07-11 02:53:14', 'trực tiếp'),
(73, 70, 'vương', '0327726001', 'hải tân', '', 'Đang xử lý', 21000000, '2022-07-11 03:00:48', 'chuyển khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_product`
--

CREATE TABLE `order_product` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_product`
--

INSERT INTO `order_product` (`id_order`, `id_product`, `quantity_order`) VALUES
(72, 4, 2),
(72, 21, 2),
(72, 64, 1),
(73, 65, 1),
(73, 68, 1),
(73, 70, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_manufacturer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` char(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_category`, `id_manufacturer`, `name`, `image`, `price`, `quantity`, `description`, `discount`) VALUES
(2, 1, 1, 'Laptop MacBook Pro 14 M1 Max 2021 10-core CPU/32GB/512GB/24-core GPU (Z15G) ', 'macbook-pro-14-m1-max-2021-10-core-cpu-600x600.jpg', 20000000, 50, 'CPU: Apple M1 Max, 400GB/s memory bandwidth;RAM: 32 GB;Ổ cứng: 512 GB SSD;Màn hình: 14.2 inch, Liquid Retina XDR display (3024 x 1964), 120Hz;Card màn hình: Card tích hợp24 nhân GPU;Cổng kết nối: 3 x Thunderbolt 4 USB-C, HDMI, Jack tai nghe 3.5 mm;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Mac OS;Thiết kế: Vỏ kim loại nguyên khối;Kích thước, trọng lượng: Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm - Nặng 1.6 kg;Thời điểm ra mắt: 10/2021', 10),
(3, 1, 1, 'Laptop MacBook Pro 14 M1 Pro 2021 10-core CPU/32GB/512GB/16-core GPU (Z15J001N0) ', 'macbook-pro-14-inch-m1-pro-2021-10-core-cpu-thumb-1-600x600.jpg', 10000000, 50, 'CPU: Apple M1 Pro, 200GB/s memory bandwidth;RAM: 32 GB;Ổ cứng: 512 GB SSD;Màn hình: 14.2 inch, Liquid Retina XDR display (3024 x 1964), 120Hz;Card màn hình: Card tích hợp, 16 core-GPU;Cổng kết nối: 3 x Thunderbolt 4 USB-C, HDMI, Jack tai nghe 3.5 mm;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Mac OS;Thiết kế: Vỏ kim loại nguyên khối;Kích thước, trọng lượng: Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm - Nặng 1.6 kg;Thời điểm ra mắt: 10/2021', 10),
(4, 1, 4, 'Laptop Dell Gaming Alienware m15 R6 i7 11800H/32GB/1TB SSD/8GB RTX3070/240Hz/OfficeHS/Win11 (70272633) ', 'dell-gaming-alienware-m15-r6-i7-11800h-32gb-1tb-ssd-8gb-600x600.jpg', 25000000, 49, 'CPU: i711800H, 2.30 GHz;RAM: 32 GB, DDR4 2 khe (1 khe 16GB + 1 khe 16GB)3200 MHz;Ổ cứng: 1 TB SSD M.2 PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB), Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 2TB);Màn hình: 15.6\", QHD (2560 x 1440), 240Hz;Card màn hình: Card rời, RTX 3070 8GB;Cổng kết nối: 3 x USB 3.2, HDMI, Jack tai nghe 3.5 mm, LAN (RJ45), USB Type-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 vĩnh viễn;Thiết kế: Vỏ nhựa;Kích thước, trọng lượng: Dài 356 mm - Rộng 272 mm - Dày 19 mm - Nặng 2.69 kg;Thời điểm ra mắt: 2021', 10),
(5, 1, 4, 'Laptop Dell Inspiron 15 5515 R7 5700U/8GB/512GB/Office H&S/Win11 (N5R75700U104W1) ', 'dell-inspiron-15-5515-r7-5700u-8gb-512gb-office-600x600.jpg', 30000000, 50, 'CPU: Ryzen 75700U, 1.8GHz;RAM: 8 GB, DDR4 2 khe (1 khe 8GB + 1 khe rời), 3200 MHz;Ổ cứng: 512 GB SSD NVMe PCIe, Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng;Màn hình: 15.6\", Full HD (1920 x 1080);Card màn hình: Card tích hợp, Radeon;Cổng kết nối: 2 x USB 3.1HDMI, Jack tai nghe 3.5 mm, USB Type-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 vĩnh viễn;Thiết kế: Vỏ nhựa;Kích thước, trọng lượng: Dài 356.06 mm - Rộng 228.9 mm - Dày 17.99 mm - Nặng 1.75 kg;Thời điểm ra mắt: 2021', 10),
(6, 1, 4, 'Laptop Dell Gaming Alienware m15 R6 i7 11800H/32GB/1TB SSD/6GB RTX3060/165Hz/Office H&S/Win11 (P109F001DBL)', 'dell-gaming-alienware-m15-r6-i7-p109f001dbl-020322-112012-600x600.jpg', 15000000, 50, 'CPU: i711800H, 2.30 GHz;RAM: 32 GB, DDR4 2 khe (1 khe 16GB + 1 khe 16GB), 3200 MHz;Ổ cứng: 1TB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB M.2 2280 PCIe Gen4 x4 NVMe / 1TB M.2 2280 PCIe Gen3 x4 NVMe, Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1TB);Màn hình: 15.6\", Full HD (1920 x 1080), 165Hz;Card màn hình: Card rời, RTX 3060 6GB;Cổng kết nối: 3 x USB 3.2, HDMI, Jack tai nghe 3.5 mm, LAN (RJ45), Thunderbolt 4 USB-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 vĩnh viễn;Thiết kế: Vỏ kim loại Kích thước, trọng lượng: Dài 356.2 mm - Rộng 272.5 mm - Dày 19.2 mm - Nặng 2.69 kg;Thời điểm ra mắt: 2021', 10),
(7, 1, 4, 'Laptop Dell Gaming G15 5515 R5 5600H/8GB/256GB/4GB RTX3050/120Hz/OfficeHS/Win11 (P105F004CGR) ', 'dell-gaming-g15-5515-r5-p105f004cgr-291121-115616-600x600.jpg', 23000000, 50, 'CPU: Ryzen 55600H, 3.3GHz;RAM: 8 GB, DDR4 2 khe (1 khe 8GB + 1 khe rời), 3200 MHz;Ổ cứng: 256 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB (2280) / 1TB (2230)), Không hỗ trợ khe cắm HDD;Màn hình: 15.6\", Full HD (1920 x 1080), 120Hz;Card màn hình: Card rời, RTX 3050 4GB;Cổng kết nối: 1 x USB 3.22 x USB 2.0, HDMI, Jack tai nghe 3.5 mm, LAN (RJ45), USB Type-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 vĩnh viễn;Thiết kế: Vỏ nhựa;Kích thước, trọng lượng: Dài 357.26 mm - Rộng 272.11 mm - Dày 26.9 mm - Nặng 2.8 kg;Thời điểm ra mắt: 2021', 10),
(8, 1, 4, 'Laptop Dell Gaming G15 5511 i7 11800H/16GB/512GB/4GB RTX3050Ti/120Hz/Office H&S/Win11 (P105F006BGR)', 'dell-gaming-g15-5511-i7-p105f006bgr-140222-091855-600x600.jpg', 25000000, 50, 'CPU: i711800H, 2.30 GHz;RAM: 16 GB, DDR4 2 khe (1 khe 8GB + 1 khe 8GB), 3200 MHz;Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB), Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1TB);Màn hình: 15.6\", Full HD (1920 x 1080), 120Hz;Card màn hình: Card rời, RTX 3050Ti 4GB;Cổng kết nối: 3 x USB 3.2, HDMI, Jack tai nghe 3.5 mm, LAN (RJ45), USB Type-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 vĩnh viễn;Thiết kế: Vỏ nhựa;Kích thước, trọng lượng: Dài 357.26 mm - Rộng 272.11 mm - Dày 25.33 mm - Nặng 2.81 kg;Thời điểm ra mắt: 2021', 10),
(9, 1, 4, 'Laptop Dell Gaming G15 5515 R7 5800H/16GB/512GB/4GB RTX3050Ti/120Hz/OfficeHS/Win11 (70266675) ', 'dell-gaming-g15-5515-r7-5800h-16gb-512gb-4gb-rtx3050ti-600x600.jpg', 22000000, 50, 'CPU: Ryzen 75800H, 3.2GHz;RAM: 16 GB, DDR4 2 khe (1 khe 8GB + 1 khe 8GB), 3200 MHz;Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB (2280) / 1TB (2230)), Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1TB), Không hỗ trợ khe cắm HDD;Màn hình: 15.6\", Full HD (1920 x 1080), 120Hz;Card màn hình: Card rời, RTX 3050Ti 4GB;Cổng kết nối: 1 x USB 3.22 x USB 2.0, HDMI, Jack tai nghe 3.5 mmLAN (RJ45), USB Type-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL + Office Home & Student 2021 vĩnh viễn;Thiết kế: Vỏ nhựa;Kích thước, trọng lượng: Dài 357 mm - Rộng 272 mm - Dày 25 mm - Nặng 2.81 kg;Thời điểm ra mắt: 2021', 10),
(10, 1, 4, 'Laptop Dell Latitude 3520 i5 1135G7/8GB/256GB/Win10 Pro (70251593) ', 'dell-latitude-3520-i5-70251593-091221-020948-600x600.jpg', 33000000, 50, 'CPU: i5, 1135G7, 2.4GHz;RAM: 8 GB, DDR4 2 khe (1 khe 8GB + 1 khe rời), 3200 MHz;Ổ cứng: 256 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB), Hỗ trợ thêm 1 khe cắm HDD SATA (nâng cấp tối đa 1TB);Màn hình: 15.6\", Full HD (1920 x 1080);Card màn hình: Card tích hợpIntel Iris Xe Cổng kết nối: 2 x USB 3.2, HDMI, Jack tai nghe 3.5 mm, LAN (RJ45), USB 2.0, USB Type-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 10 Pro;Thiết kế: Vỏ nhựa;Kích thước, trọng lượng: Dài 361 mm - Rộng 240.9 mm - Dày 18 mm - Nặng 1.79 Kg;Thời điểm ra mắt: 2021', 10),
(11, 1, 5, 'Laptop Asus TUF Gaming FX516PM i7 11370H/8GB/512GB/6GB RTX3060/144Hz/Win10 (HN002T) ', 'asus-tuf-gaming-fx516pm-i7-hn002t-600x600.jpg', 30000000, 50, 'CPU: i7, 11370H, 3.3GHz;RAM: 8 GB, DDR4 2 khe (1 khe 8GB onboard + 1 khe trống)3200 MHz;Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB), Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng (nâng cấp tối đa 1TB) Màn hình: 15.6\", Full HD (1920 x 1080), 144Hz;Card màn hình: Card rời, RTX 3060 6GB;Cổng kết nối: 3 x USB 3.2, HDMI 2.0, Jack tai nghe 3.5 mm, LAN (RJ45)Thunderbolt 4 USB-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 10 Home SL;Thiết kế: Vỏ nhựa - nắp lưng bằng kim loại;Kích thước, trọng lượng: Dài 360 mm - Rộng 252 mm - Dày 19.9 mm - Nặng 2 kg;Thời điểm ra mắt: 2021', 10),
(12, 1, 5, 'Laptop Asus Vivobook 15 X1502ZA i5 1240P/8GB/512GB/Win11 (EJ120W)', 'asus-vivobook-15-x1502za-i5-ej120w-600x600.jpg', 33000000, 50, 'CPU: i5, 1240P, 3.3GHz;RAM: 8 GB, DDR4 2 khe (1 khe 8GB onboard + 1 khe trống), 3200 MHz;Ổ cứng: 512 GB SSD NVMe PCIe;Màn hình: 15.6\", Full HD (1920 x 1080);Card màn hình: Card tích hợpIntel Iris Xe;Cổng kết nối: 1 x USB 2.02 x USB 3.2, HDMI, Jack tai nghe 3.5 mm, USB Type-C;Hệ điều hành: Windows 11 Home SL;Thiết kế: Vỏ nhựa;Kích thước, trọng lượng: Dài 359.7 mm - Rộng 232.5 mm - Dày 19.9 mm - Nặng 1.7 kg;Thời điểm ra mắt: 2022', 10),
(13, 1, 5, 'Laptop Asus ZenBook UX425EA i5 1135G7/8GB/512GB/Cáp/Túi/Win11 (KI839W) ', 'asus-zenbook-ux425ea-i5-1135g7-8gb-512gb-600x600.jpg', 25000000, 50, 'CPU: i5, 1135G7, 2.4GHz;RAM: 8 GB, LPDDR4X (On board), 4266 MHz;Ổ cứng: 512 GB SSD NVMe PCIe;Màn hình: 14\", Full HD (1920 x 1080);Card màn hình: Card tích hợp, Intel Iris Xe;Cổng kết nối: 1 x USB 3.22 x Thunderbolt 4 USB-CHDMI;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL;Thiết kế: Vỏ kim loại nguyên khối;Kích thước, trọng lượng: Dài 319 mm - Rộng 208 mm - Dày 13.9 mm - Nặng 1.17 kg;Thời điểm ra mắt: 2021', 10),
(14, 1, 5, 'Laptop Asus Gaming ROG Flow Z13 GZ301Z i7 12700H/16GB/512GB/4GB RTX3050/120Hz/Touch/Pen/Túi/Win11 (LD110W) ', 'asus-gaming-rog-flow-z13-gz301z-i7-ld110w-160322-120057-600x600.jpg', 40000000, 50, 'CPU: i7, 12700H, 2.30 GHz;RAM: 16 GB, LPDDR5 (8GB On board + 8GB On board), 5200 MHz;Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB);Màn hình: 13.4\", WUXGA (1920 x 1200), 120Hz;Card màn hình: Card rời, RTX 3050 4GB Cổng kết nối: 1x ROG XG Mobile Interface1x USB 3.2 Gen 2 Type-C support DisplayPort / power delivery / G-SYNC, Jack tai nghe 3.5 mm, Thunderbolt 4 USB-CUSB 2.0;Đặc biệt: Có màn hình cảm ứng, Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL;Thiết kế: Vỏ nhựa - nắp lưng bằng kim loại;Kích thước, trọng lượng: Dài 302 mm - Rộng 204 mm - Dày 12 mm - Nặng 1.18 kg;Thời điểm ra mắt: 2022', 10),
(15, 1, 5, 'Laptop Asus ZenBook UX482EA i5 1135G7/8GB/512GBTouch/Pen/Túi/Stand/Win11 (KA397W) ', 'asus-zenbook-ux482ea-i5-1135g7-8gb-512gbtouch-600x600.jpg', 35000000, 50, 'CPU: i5, 1135G7, 2.4GHz;RAM: 8 GB, LPDDR4X (On board), 4267 MHz;Ổ cứng: 512 GB SSD NVMe PCIe;Màn hình: 14\", Full HD (1920 x 1080);Card màn hình: Card tích hợp, Intel Iris Xe;Cổng kết nối: 1 x USB 3.22 x Thunderbolt 4 USB-CHDMI, Jack tai nghe 3.5 mm;Đặc biệt: Có màn hình cảm ứng, Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL;Thiết kế: Vỏ kim loại;Kích thước, trọng lượng: Dài 324 mm - Rộng 222 mm - Dày 17.3 mm - Nặng 1.62 kg;Thời điểm ra mắt: 2021', 10),
(16, 1, 5, 'Laptop Asus ZenBook Duo UX482EA i5 1135G7/8GB/512GB/Touch/Pen/Túi/Stand/Win10 (KA274T)  ', 'asus-zenbook-ux482ea-i5-ka274t-271021-093120-600x600.jpg', 28000000, 50, 'CPU: i5, 1135G7, 2.4GHz;RAM: 8 GB, LPDDR4X (On board), 4267 MHz;Ổ cứng: 512 GB SSD NVMe PCIe;Màn hình: 14\", Full HD (1920 x 1080);Card màn hình: Card tích hợp, Intel Iris Xe;Cổng kết nối: 1 x USB 3.22 x Thunderbolt 4 USB-CHDMI, Jack tai nghe 3.5 mm;Đặc biệt: Có màn hình cảm ứng, Có đèn bàn phím;Hệ điều hành: Windows 10 Home SL;Thiết kế: Vỏ kim loại;Kích thước, trọng lượng: Dài 324 mm - Rộng 222 mm - Dày 17.3 mm - Nặng 1.62 kg;Thời điểm ra mắt: 2021', 10),
(17, 1, 5, 'Laptop Asus VivoBook Pro 16X OLED M7600QC R5 5600H/16GB/512GB/4GB RTX3050/Win11 (L2077W)  ', 'asus-vivobook-pro-16x-oled-m7600qc-r5-l2077w-110322-113431-600x600.jpg', 26000000, 50, 'CPU: Ryzen 55600H, 3.3GHz;RAM: 16 GB, DDR4 (On board), 3200 MHz;Ổ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB);Màn hình: 16\", 4K/UHD+ (3840 x 2400) OLED;Card màn hình: Card rời, RTX 3050 4GB;Cổng kết nối: 1 x USB 3.22 x USB 2.0, HDMI, Jack tai nghe 3.5 mm, USB Type-C;Đặc biệt: Có đèn bàn phím;Hệ điều hành: Windows 11 Home SL;Thiết kế: Vỏ kim loại;Kích thước, trọng lượng: Dài 360.5 mm - Rộng 259 mm - Dày 18.9 mm - Nặng 1.95 kg;Thời điểm ra mắt: 2022', 10),
(20, 3, 1, 'Điện thoại iPhone 12 Pro 256GB', 'iphone-12-pro-xam-new-600x600-600x600.jpg', 30000000, 50, 'Màn hình: OLED, 6.1\", Super Retina XDR;Hệ điều hành: iOS 15;Camera sau: 3 camera 12 MP;Camera trước: 12 MP;Chip: Apple A14 Bionic;RAM: 6 GB;Bộ nhớ trong: 256 GB;SIM: 1 Nano SIM & 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 2815 mAh, 20 W', 10),
(21, 3, 1, 'Điện thoại iPhone 13 mini 256GB', 'iphone-13-mini-starlight-1-600x600.jpg', 50000000, 48, 'Màn hình: OLED, 5.4\", Super Retina XDR;Hệ điều hành: iOS 15;Camera sau: 2 camera 12 MP;Camera trước: 12 MP;Chip: Apple A15 Bionic;RAM: 4 GB;Bộ nhớ trong: 256 GB SIM: 1 Nano SIM & 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 2438 mAh, 20 W', 10),
(22, 3, 1, 'Điện thoại iPhone 12 64GB', 'iphone-12-xanh-la-new-2-600x600.jpg', 20000000, 50, 'Màn hình: OLED, 6.1\", Super Retina XDR;Hệ điều hành: iOS 15;Camera sau: 2 camera 12 MP;Camera trước: 12 MP;Chip: Apple A14 Bionic;RAM: 4 GB;Bộ nhớ trong: 64 GB SIM: 1 Nano SIM & 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 2815 mAh, 20 W', 10),
(23, 3, 1, 'Điện thoại iPhone 13 Pro Max 256GB', 'iphone-13-pro-max-sierra-blue-600x600.jpg', 50000000, 50, 'Màn hình: OLED, 6.7\", Super Retina XDR;Hệ điều hành: iOS 15;Camera sau: 3 camera 12 MP;Camera trước: 12 MP;Chip: Apple A15 Bionic;RAM: 6 GB;Bộ nhớ trong: 256 GB SIM: 1 Nano SIM & 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 4352 mAh, 20 W', 10),
(24, 3, 1, 'Điện thoại iPhone 12 mini 128GB', 'iphone-12-mini-do-600x600.jpg', 30000000, 50, 'Màn hình: OLED, 5.4\", Super Retina XDR;Hệ điều hành: iOS 15;Camera sau: 2 camera 12 MP;Camera trước: 12 MP;Chip: Apple A14 Bionic;RAM: 4 GB;Bộ nhớ trong: 128 GB;SIM: 1 Nano SIM & 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 2227 mAh, 20 W', 10),
(25, 3, 1, 'Điện thoại iPhone 12 128GB ', 'iphone-12-trang-600x600.jpg', 25000000, 50, 'Màn hình: OLED, 6.1\", Super Retina XDR;Hệ điều hành: iOS 15;Camera sau: 2 camera 12 MP;Camera trước: 12 MP;Chip: Apple A14 Bionic;RAM: 4 GB;Bộ nhớ trong: 128 GB;SIM: 1 Nano SIM & 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 2815 mAh, 20 W', 10),
(26, 3, 1, 'Điện thoại iPhone 13 256GB ', 'iphone-13-red-1-600x600.jpg', 33000000, 50, 'Màn hình: OLED, 6.1\", Super Retina XDR;Hệ điều hành: iOS 15;Camera sau: 2 camera 12 MP;Camera trước: 12 MP;Chip: Apple A15 Bionic;RAM: 4 GB;Bộ nhớ trong: 256 GB;SIM: 1 Nano SIM & 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 3240 mAh, 20 W', 10),
(27, 3, 2, 'Điện thoại Samsung Galaxy A03s', 'samsung-galaxy-a03s-black-600x600.jpg', 25000000, 50, 'Màn hình: PLS LCD, 6.5\", HD+;Hệ điều hành: Android 11;Camera sau: Chính 13 MP & Phụ 2 MP, 2 MP;Camera trước: 5 MP;Chip: MediaTek MT6765;RAM: 4 GB;Bộ nhớ trong: 64 GB;SIM: 2 Nano SIM, Hỗ trợ 4G;Pin, Sạc: 5000 mAh, 7.75 W', 10),
(28, 3, 2, 'Điện thoại Samsung Galaxy A23 4GB', 'samsung-galaxy-a23-cam-thumb-600x600.jpg', 30000000, 50, 'Màn hình: PLS TFT LCD, 6.6\", Full HD+;Hệ điều hành: Android 12;Camera sau: Chính 50 MP & Phụ 5 MP, 2 MP, 2 MP;Camera trước: 8 MP;Chip: Snapdragon 680 8 nhân;RAM: 4 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM, Hỗ trợ 4G;Pin, Sạc: 5000 mAh, 25 W', 10),
(29, 3, 2, 'Điện thoại Samsung Galaxy A23 6GB', 'samsung-galaxy-a23-xanh-thumb-600x600.jpg', 30000000, 50, 'Màn hình: PLS TFT LCD, 6.6\", Full HD+;Hệ điều hành: Android 12;Camera sau: Chính 50 MP & Phụ 5 MP, 2 MP, 2 MP;Camera trước: 8 MP;Chip: Snapdragon 680 8 nhân;RAM: 6 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM, Hỗ trợ 4G;Pin, Sạc: 5000 mAh, 25 W', 10),
(30, 3, 2, 'Điện thoại Samsung Galaxy A73 5G 128GB ', 'samsung-galaxy-a73-5g-xanh-thumb-600x600.jpg', 15000000, 50, 'Màn hình: Super AMOLED Plus, 6.7\", Full HD+;Hệ điều hành: Android 12;Camera sau: Chính 108 MP & Phụ 12 MP, 5 MP, 5 MP;Camera trước: 32 MP;Chip: Snapdragon 778G 5G 8 nhân;RAM: 8 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G;Pin, Sạc: 5000 mAh, 25 W', 10),
(31, 3, 2, 'Điện thoại Samsung Galaxy S22+ 5G 256GB  ', 'samsung-galaxy-a73-5g-xanh-thumb-600x600.jpg', 10000000, 50, 'Màn hình: Dynamic AMOLED 2X, 6.6\", Full HD+;Hệ điều hành: Android 12;Camera sau: Chính 50 MP & Phụ 12 MP, 10 MP;Camera trước: 10 MP;Chip: Snapdragon 8 Gen 1 8 nhân;RAM: 8 GB;Bộ nhớ trong: 256 GB;SIM: 2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 4500 mAh, 45 W', 10),
(32, 3, 2, 'Điện thoại Samsung Galaxy S22 5G 128GB ', 'Galaxy-S22-Black-600x600.jpg', 20000000, 50, 'Màn hình: Dynamic AMOLED 2X, 6.1\", Full HD+;Hệ điều hành: Android 12;Camera sau: Chính 50 MP & Phụ 12 MP, 10 MP;Camera trước: 10 MP;Chip: Snapdragon 8 Gen 1 8 nhân;RAM: 8 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G;Pin, Sạc: 3700 mAh, 25 W', 10),
(33, 3, 2, 'Điện thoại Samsung Galaxy M33 5G', 'Samsung-galaxy-m53-green-600x600.jpg', 10000000, 50, 'Màn hình: TFT LCD, 6.6\", Full HD+;Hệ điều hành: Android 12;Camera sau: Chính 50 MP & Phụ 5 MP, 2 MP, 2 MP;Camera trước: 8 MP;Chip: Exynos 1280 8 nhân;RAM: 6 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM, Hỗ trợ 5G;Pin, Sạc: 5000 mAh, 25 W', 10),
(34, 3, 3, 'Điện thoại Xiaomi Redmi Note 11 (4GB/64GB) ', 'Xiaomi-redmi-note-11-black-600x600.jpeg', 1500000, 50, 'Màn hình: AMOLED, 6.43\", Full HD+;Hệ điều hành: Android 11;Camera sau: Chính 50 MP & Phụ 8 MP, 2 MP, 2 MP;Camera trước: 13 MP;Chip: Snapdragon 680 8 nhân;RAM: 4 GB;Bộ nhớ trong: 64 GB;SIM: 2 Nano SIM, Hỗ trợ 4G;Pin, Sạc: 5000 mAh, 33 W', 10),
(35, 3, 3, 'Điện thoại Xiaomi Redmi Note 11S', 'xiaomi-redmi-note-11s-xam-thumb-600x600.jpg', 3500000, 50, 'Màn hình: AMOLED, 6.43\", Full HD+;Hệ điều hành: Android 11;Camera sau: Chính 108 MP & Phụ 8 MP, 2 MP, 2 MP;Camera trước: 16 MP;Chip: MediaTek Helio G96 8 nhân;RAM: 8 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM, Hỗ trợ 4G;Pin, Sạc: 5000 mAh, 33 W', 10),
(36, 3, 3, 'Điện thoại Xiaomi 11T 5G 128GB ', 'Xiaomi-11T-White-1-2-3-600x600.jpg', 2500000, 50, 'Màn hình: AMOLED, 6.67\", Full HD+;Hệ điều hành: Android 11;Camera sau: Chính 108 MP & Phụ 8 MP, 5 MP;Camera trước: 16 MP;Chip: MediaTek Dimensity 1200;RAM: 8 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM, Hỗ trợ 5G;Pin, Sạc: 5000 mAh, 67 W', 10),
(37, 3, 3, 'Điện thoại Xiaomi Redmi Note 11S 5G', 'xiaomi-redmi-note-11s-5g- thumb-600x600.jpg', 2000000, 50, 'Màn hình: IPS LCD, 6.6\", Full HD+;Hệ điều hành: Android 11;Camera sau: Chính 50 MP & Phụ 8 MP, 2 MP;Camera trước: 13 MP;Chip: MediaTek Dimensity 810 5G 8 nhân;RAM: 6 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G;Pin, Sạc: 5000 mAh, 33 W', 10),
(38, 3, 3, 'Điện thoại Xiaomi 11T Pro 5G 12GB ', 'Xiaomi-11T-Pro-Grey-600x600.jpg', 5000000, 50, 'Màn hình: AMOLED, 6.67\", Full HD+;Hệ điều hành: Android 11;Camera sau: Chính 108 MP & Phụ 8 MP, 5 MP;Camera trước: 16 MP;Chip: Snapdragon 888;RAM: 12 GB;Bộ nhớ trong: 256 GB;SIM: 2 Nano SIM, Hỗ trợ 5G;Pin, Sạc: 5000 mAh, 120 W', 10),
(39, 3, 3, 'Điện thoại Xiaomi Redmi Note 10 Pro (8GB/128GB) ', 'xiaomi-redmi-note-10-pro-thumb-xam-600x600-600x600.jpg', 3000000, 50, 'Màn hình: AMOLED, 6.67\", Full HD+;Hệ điều hành: Android 11;Camera sau: Chính 108 MP & Phụ 8 MP, 5 MP, 2 MP;Camera trước: 16 MP;Chip: Snapdragon 732G;RAM: 8 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM, Hỗ trợ 4G;Pin, Sạc: 5020 mAh, 33 W', 10),
(40, 3, 3, 'Điện thoại Xiaomi Redmi 9C (4GB/128GB)', 'xiaomi-redmi-9c-4gb-xanh-1-600x600.jpg', 2500000, 50, 'Màn hình: IPS LCD, 6.53\", HD+;Hệ điều hành: Android 10;Camera sau: Chính 13 MP & Phụ 2 MP, 2 MP;Camera trước: 5 MP;Chip: MediaTek Helio G35;RAM: 4 GB;Bộ nhớ trong: 128 GB;SIM: 2 Nano SIM, Hỗ trợ 4G;Pin, Sạc: 5000 mAh, 10 W', 10),
(41, 4, 1, 'Máy tính bảng iPad Pro M1 11 inch WiFi 2TB (2021) ', 'ipad-pro-m1-11-inch-wifi-2tb-2021-xam-thumb-600x600 (1).jpg', 3500000, 50, 'Màn hình: 11\", Liquid Retina;Hệ điều hành: iPadOS 15;Chip: Apple M1 8 nhân;RAM: 16 GB;Bộ nhớ trong: 2 TB;Kết nối: Nghe gọi qua FaceTime;Camera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR;Camera trước: 12 MP;Pin, Sạc: 28.65 Wh (~ 7538 mAh), 20 W', 10),
(42, 4, 1, 'Máy tính bảng iPad Pro M1 12.9 inch WiFi 1TB (2021) ', 'ipad-pro-m1-129-inch-wifi-gray-thumb-600x600.jpg', 10000000, 50, 'Màn hình: 12.9\", Liquid Retina XDR mini-LED LCD;Hệ điều hành: iPadOS 15;Chip: Apple M1 8 nhân;RAM: 16 GB;Bộ nhớ trong: 1 TB;Kết nối: Nghe gọi qua FaceTime;Camera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR;Camera trước: 12 MP;Pin, Sạc: 40.88 Wh (~ 10.835 mAh), 20 W', 10),
(43, 4, 1, 'Máy tính bảng iPad Pro M1 11 inch WiFi 512GB (2021) ', 'ipad-pro-m1-11-inch-wifi-sliver-thumb-600x600.jpg', 20000000, 50, 'Màn hình: 11\", Liquid Retina;Hệ điều hành: iPadOS 15;Chip: Apple M1 8 nhân;RAM: 8 GB;Bộ nhớ trong: 512 GB;Kết nối: Nghe gọi qua FaceTime;Camera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR;Camera trước: 12 MP;Pin, Sạc: 28.65 Wh (~ 7538 mAh), 20 W', 10),
(44, 4, 1, 'Máy tính bảng iPad Pro M1 11 inch WiFi 256GB (2021)  ', 'ipad-pro-m1-11-inch-wifi-sliver-thumb-600x600.jpg', 15000000, 50, 'Màn hình: 11\", Liquid Retina;Hệ điều hành: iPadOS 15;Chip: Apple M1 8 nhân;RAM: 8 GB;Bộ nhớ trong: 256 GB;Kết nối: Nghe gọi qua FaceTime;Camera sau: Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR;Camera trước: 12 MP;Pin, Sạc: 28.65 Wh (~ 7538 mAh), 20 W', 10),
(45, 4, 1, 'Máy tính bảng iPad 9 WiFi Cellular 256GB ', 'ipad-gen-9-wifi-cellular-grey-600x600.jpg', 20000000, 50, 'Màn hình: 10.2\", Retina IPS LCD;Hệ điều hành: iPadOS 15;Chip: Apple A13 Bionic 6 nhân;RAM: 3 GB;Bộ nhớ trong: 256 GB;Kết nối: Hỗ trợ 4G,Nghe gọi qua FaceTime;SIM: 1 Nano SIM & 1 eSIM;Camera sau: 8 MP;Camera trước: 12 MP;Pin, Sạc: 32.4 Wh (~ 8600 mAh), 20 W', 10),
(46, 4, 1, 'Máy tính bảng iPad Air 5 M1 Wifi Cellular 64GB', 'ipad-air-5-wifi-cellular-tim-thumb-600x600.jpg', 10000000, 50, 'Màn hình: 10.9\", Retina IPS LCD;Hệ điều hành: iPadOS 15;Chip: Apple M1 8 nhân;RAM: 8 GB;Bộ nhớ trong: 64 GB;Kết nối: 5G, Nghe gọi qua FaceTime;SIM: 1 Nano SIM & 1 eSIM;Camera sau: 12 MP;Camera trước: 12 MP;Pin, Sạc: 28.6 Wh (~ 7587 mAh), 20 W', 10),
(47, 4, 1, 'Máy tính bảng iPad mini 6 WiFi 256GB', 'ipad-mini-6-wifi-starlight-1-600x600.jpg', 15000000, 50, 'Màn hình: 8.3\", LED-backlit IPS LCD;Hệ điều hành: iPadOS 15;Chip: Apple A15 Bionic;RAM: 4 GB;Bộ nhớ trong: 256 GB;Kết nối: Nghe gọi qua FaceTime;Camera sau: 12 MP;Camera trước: 12 MP;Pin, Sạc: 19.3 Wh, 20 W', 10),
(48, 4, 2, 'Máy tính bảng Samsung Galaxy Tab S6 Lite ', 'samsung-galaxy-tab-s6-lite-600x600-2-600x600.jpg', 10000000, 50, 'Màn hình: 10.4\", PLS LCD;Hệ điều hành: Android 10;Chip: Exynos 9611;RAM: 4 GB;Bộ nhớ trong: 64 GB;Kết nối: Hỗ trợ 4G, Có nghe gọi;SIM: 1 Nano SIM;Camera sau: 8 MP;Camera trước: 5 MP;Pin, Sạc: 7040 mAh, 10 W', 10),
(49, 4, 2, 'Máy tính bảng Samsung Galaxy Tab S7 FE 4G  ', 'samsung-galaxy-tab-s7-fe-green-600x600.jpg', 9000000, 50, 'Màn hình: 12.4\", TFT LCD;Hệ điều hành: Android 11;Chip: Snapdragon 750G;RAM: 4 GB;Bộ nhớ trong: 64 GB;Kết nối: Hỗ trợ 4G, Có nghe gọi;SIM: 1 Nano SIM;Camera sau: 8 MP;Camera trước: 5 MP;Pin, Sạc: 10090 mAh, 45 W', 10),
(50, 4, 2, 'Máy tính bảng Samsung Galaxy Tab S8', 'Samsung-Galaxy-tab-s8-black-thumb-600x600.jpg', 4500000, 50, 'Màn hình: 11\", LTPS;Hệ điều hành: Android 12;Chip: Snapdragon 8 Gen 1 8 nhân;RAM: 8 GB;Bộ nhớ trong: 128 GB;Kết nối: 5G, Có nghe gọi;SIM: 1 Nano SIM;Camera sau: Chính 13 MP & Phụ 6 MP;Camera trước: 12 MP;Pin, Sạc: 8000 mAh, 45 W', 10),
(51, 4, 2, 'Máy tính bảng Samsung Galaxy Tab S7 ', 'samsung-galaxy-tab-s7-thumb-xanh-600x600-600x600.jpg', 4000000, 50, 'Màn hình: 11\", LTPS IPS LCD;Hệ điều hành: Android 10;Chip: Snapdragon 865+;RAM: 6 GB;Bộ nhớ trong: 128 GB;Kết nối: Hỗ trợ 4G, Có nghe gọi;SIM: 1 Nano SIM (chung thẻ nhớ);Camera sau: Chính 13 MP & Phụ 5 MP;Camera trước: 8 MP;Pin, Sạc: 8000 mAh, 45 W', 10),
(52, 4, 2, 'Máy tính bảng Samsung Galaxy Tab A8 8\" T295 (2019) ', 'samsung-galaxy-tab-a8-t295-2019-black-1-600x600.jpg', 2000000, 50, 'Màn hình: 8\", TFT LCD;Hệ điều hành: Android 11;Chip: Snapdragon 429;RAM: 2 GB;Bộ nhớ trong: 32 GB;Kết nối: Hỗ trợ 4G, Có nghe gọi;SIM: 1 Nano SIM;Camera sau: 8 MP;Camera trước: 2 MP;Pin, Sạc: 5100 mAh, 10 W', 10),
(53, 4, 2, 'Máy tính bảng Samsung Galaxy Tab A8 (2022)    ', 'samsung-galaxy-tab-a8-thumb-1-600x600.jpg', 3000000, 50, 'Màn hình: 10.5\", TFT LCD;Hệ điều hành: Android 11;Chip: UniSOC T618;RAM: 4 GB;Bộ nhớ trong: 64 GB;Kết nối: Hỗ trợ 4G, Có nghe gọi;SIM: 1 Nano SIM;Camera sau: 8 MP;Camera trước: 5 MP;Pin, Sạc: 7040 mAh, 15 W', 10),
(54, 4, 2, 'Máy tính bảng Samsung Galaxy Tab S7 FE WiFi ', 'Samsung-Galaxy-Tab-S7-FE-Wifi-green-1-660x600.jpg', 5000000, 50, 'Màn hình: 12.4\", TFT LCD;Hệ điều hành: Android 11;Chip: Snapdragon 778G 8 nhân;RAM: 4 GB;Bộ nhớ trong: 64 GB;Camera sau: 8 MP;Camera trước: 5 MP;Pin, Sạc: 10090 mAh, 45 W', 10),
(55, 2, 1, 'Apple Watch SE 40mm viền nhôm dây silicone  ', 'se-40mm-vien-nhom-day-cao-su-vang-thumb-600x600.jpg', 3000000, 50, 'Màn hình: OLED, 1.57 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: iOS bản mới nhất;Mặt: Ion-X strengthened glass40 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Đo nhịp tim, Đếm số bước chân', 10),
(56, 2, 1, 'Apple Watch S6 LTE 40mm viền nhôm dây silicone ', 's6-lte-40mm-vien-nhom-day-cao-su-do-thumb-1-600x600.jpg', 7000000, 50, 'Màn hình: OLED, 1.57 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: iOS bản mới nhất;Mặt: Ion-X strengthened glass40 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', 10),
(57, 2, 1, 'Apple Watch S6 LTE 40mm viền thép dây silicone ', 'apple-watch-s6-lte-40mm-vien-thep-day-cao-su-den-thumb-600x600.jpg', 6000000, 50, 'Màn hình: OLED, 1.57 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: iOS bản mới nhất;Mặt: Kính cường lực Sapphire40 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', 10),
(58, 2, 1, 'Apple Watch Series 7 LTE 41mm ', 'apple-watch-s7-lte-41mm-vang-thumb-1-660x600.jpg', 1000000, 50, 'Màn hình: OLED, 1.61 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: iOS bản mới nhất;Mặt: Ion-X strengthened glass, 41 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', 10),
(59, 2, 1, 'Apple Watch SE 44mm viền nhôm dây silicone ', 'apple-watch-se-44mm-vien-nhom-day-cao-su-hong-thumb-600x600.jpg', 2000000, 50, 'Màn hình: OLED, 1.78 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: iOS bản mới nhất;Mặt: Ion-X strengthened glass, 44 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Đo nhịp tim, Đếm số bước chân', 10),
(60, 2, 1, 'Apple Watch S6 LTE 44mm viền nhôm dây silicone ', 's6-lte-44mm-vien-nhom-day-cao-su-xanh-thumb-1-600x600.jpg', 5000000, 50, 'Màn hình: OLED, 1.78 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: iOS bản mới nhất;Mặt: Ion-X strengthened glass, 44 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', 10),
(61, 2, 1, 'Apple Watch Series 7 LTE 41mm viền thép ', 'apple-watch-series-7-lte-41mm-vien-thep-tim-thumb-660x600.jpg', 2000000, 50, 'Màn hình: OLED, 1.61 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: iOS bản mới nhất;Mặt: Kính Sapphire, 41 mm;Tính năng cho sức khỏe: Chế độ luyện tập,  Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Điện tâm đồ,  Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', 10),
(62, 2, 2, 'Samsung Galaxy Watch 4 44mm Bạc', 'samsung-galaxy-watch-4-44mm-thumb-02-600x600.jpg', 5000000, 50, 'Màn hình: SUPER AMOLED, 1.36 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: Android dùng Google Mobile Service;Mặt: Kính cường lực Gorrilla Glass Dx+44 mm;Tính năng cho sức khỏe: Theo dõi giấc ngủ, Điện tâm đồ, Đo huyết áp, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', 10),
(63, 2, 2, 'Samsung Galaxy Watch 4 Classic 46mm Bạc', 'samsung-galaxy-watch-4-classic-46mm-bac-thumb-01-1-600x600.jpg', 6000000, 50, 'Màn hình: SUPER AMOLED, 1.36 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: Android dùng Google Mobile Service;Mặt: Kính cường lực Gorrilla Glass Dx+46 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Điện tâm đồ, Đo huyết áp, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', 10),
(64, 2, 2, 'Samsung Galaxy Watch 4 40mm Vàng Hồng ', 'samsung-galaxy-watch-4-40mm-vang-hong-thumb-1-2-3-4-600x600.jpg', 1000000, 49, 'Màn hình: SUPER AMOLED, 1.19 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: Android dùng Google Mobile Service;Mặt: Kính cường lực Gorrilla Glass Dx+40 mm;Tính năng cho sức khỏe: Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Điện tâm đồ, Đo huyết áp, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân', 10),
(65, 2, 2, 'Vòng tay thông minh Samsung Galaxy Fit2 đen', 'samsung-galaxy-fit2-den-thumb-1-1-600x600.jpg', 4000000, 49, 'Màn hình: AMOLED, 1.1 inch;Thời lượng pin: Khoảng 15 ngày;Kết nối với hệ điều hành: Android 5.0 trở lên,  iOS 12 trở lên, iPhone 7 trở lên;Mặt: Kính cường lực, 27.8 mm Dây: 24 cm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Đo nhịp tim, Đếm số bước chân;Tiện ích: Cài đặt thời gian rửa tay, Có chống nước, Rung thông báo, Thay mặt đồng hồ, Trả lời nhanh tin nhắn có sẵn, Điều khiển chơi nhạc', 10),
(66, 2, 2, 'Samsung Galaxy Watch Active 2 44mm viền thép dây da ', 'samsung-galaxy-watch-active-2-44-mm-day-da-thumb-1-1-600x600.jpg', 7000000, 50, 'Màn hình: SUPER AMOLED, 1.4 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: Android 5.0, iOS 10 trở lên;Mặt: Kính cường lực Gorrilla Glass Dx+44 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Đo nhịp tim, Đếm số bước chân', 10),
(67, 2, 2, 'Samsung Galaxy Watch Active 2 40mm viền nhôm dây silicone đen ', 'samsung-galaxy-watch-active-2-40-mm-den-thumb-1-1-600x600.jpg', 5000000, 50, 'Màn hình: SUPER AMOLED, 1.2 inch;Thời lượng pin: Khoảng 1.5 ngày;Kết nối với hệ điều hành: Android 5.0, iOS 10 trở lên;Mặt: Kính cường lực Gorrilla Glass Dx+40 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Tính lượng calories tiêu thụ, Tính quãng đường chạy, Đo nhịp tim, Đếm số bước chân', 10),
(68, 2, 3, 'Vòng đeo tay thông minh Mi Band 6 ', 'mi-band-6-thumb-1-1-600x600.jpg', 8000000, 49, 'Màn hình: AMOLED, 1.56 inch;Thời lượng pin: Khoảng 15 ngày;Kết nối với hệ điều hành: Android 5.0 trở lên, iOS 10 trở lên;Mặt: Kính cường lực, 47.4 mm Dây: 22 cm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi giấc ngủ, Theo dõi mức độ stress, Tính lượng calories tiêu thụ, Đo nhịp tim, Đo nồng độ oxy (SpO2), Đếm số bước chân Tiện ích: Báo thức, Dự báo thời tiết, Rung thông báo, Thay mặt đồng hồ, Tìm điện thoại', 10),
(69, 2, 3, 'Đồng hồ thông minh Xiaomi Watch S1 ', 'xiaomi-watch-s1-nau-thumb-mau-600x600.jpg', 5000000, 50, 'Màn hình: AMOLED, 1.43 inch;Thời lượng pin: Khoảng 12 ngày;Kết nối với hệ điều hành: Android 6.0 trở lên, iOS 10 trở lên;Mặt: Kính Sapphire, 46.5 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi chu kì kinh nguyệt, Theo dõi giấc ngủ, Theo dõi mức độ stress, Theo dõi nhịp thở, Theo dõi nhịp tim 24h, Đo nồng độ oxy (SpO2)', 10),
(70, 2, 3, 'Redmi Watch 2 Lite ', 'redmi-watch-2-lite-600x600.jpg', 9000000, 46, 'Màn hình: TFT, 1.55 inch;Thời lượng pin: Khoảng 10 ngày (sử dụng trong điều kiện tiêu chuẩn);Kết nối với hệ điều hành: Android 6.0 trở lên, iOS 10 trở lên Mặt: Kính cường lực, 41.2 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi chu kì kinh nguyệt, Theo dõi giấc ngủ, Theo dõi mức độ stress, Theo dõi nhịp thở, Theo dõi nhịp tim 24h, Đo nhịp tim, Đo nồng độ oxy (SpO2)', 10),
(71, 2, 3, 'Đồng hồ thông minh Xiaomi Watch S1 Active ', 'xiaomi-watch-s1-active-den-thumb-mau-600x600.jpg', 10000000, 49, 'Màn hình: AMOLED, 1.43 inch;Thời lượng pin: Khoảng 12 ngày;Kết nối với hệ điều hành: Android 6.0 trở lên, iOS 10 trở lên;Mặt: Kính cường lực Gorilla Glass 347 mm;Tính năng cho sức khỏe: Chế độ luyện tập, Theo dõi chu kì kinh nguyệt, Theo dõi giấc ngủ, Theo dõi mức độ stress, Theo dõi nhịp thở, Theo dõi nhịp tim 24h, Đo nồng độ oxy (SpO2)', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` char(50) NOT NULL,
  `password` char(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` char(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `gender`, `id_role`) VALUES
(70, 'User Chính', 'chinh1705201@gmail.com', 'dinhchinh2001', 'Hải Tân', '0327726001', 'Nam', 2),
(71, 'Admin Chính', 'chinh17052012@gmail.com', 'chinh123456', 'Hải Minh', '0123456789', 'Nữ', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id_order`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_manufacturer` (`id_manufacturer`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_manufacturer`) REFERENCES `manufacturers` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
