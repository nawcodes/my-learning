import 'package:flutter/material.dart';

class StyledText extends StatelessWidget {
  const StyledText({super.key});

  @override
  Widget build(BuildContext context) {
    return const Text(
      "Nawcodes",
      style: TextStyle(color: Color.fromRGBO(255, 255, 255, 1), fontSize: 24),
    );
  }
}
