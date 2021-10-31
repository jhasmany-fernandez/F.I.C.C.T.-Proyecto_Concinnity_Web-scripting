import 'package:flutter/material.dart';

import 'features/presentation/pages/shop_page.dart';

void main() => runApp(MyApp());

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'M-DEV',
      theme: ThemeData(
        primarySwatch: Colors.red,
      ),
      home: ShopPage(),
    );
  }
}
