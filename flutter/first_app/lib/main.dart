import 'package:flutter/material.dart';

void main() {
  runApp(
    MaterialApp(
      home: Scaffold(
        body: GradientContainer(),
      ),
    ),
  );
}

class GradientContainer extends StatelessWidget {
  const GradientContainer({super.key});

  @override
  Widget build(BuildContext context) {
    return Container(
      decoration: const BoxDecoration(
        gradient: LinearGradient(
          colors: [Colors.blue, Colors.red],
          begin: Alignment.topLeft,
          end: Alignment.bottomRight,
        ),
      ),
      child: const Center(
        child: Text(
          "Nawcodes",
          style: TextStyle(
            color: Colors.white,
            fontSize: 24,
          ),
        ),
      ),
    );
  }
}
/**
 * 2. Sections untitled
 * context
 * - How to import this fucking package
 * - How to use the function widget like MaterialApp
 * - then u should know if has curly named parameter, u must consistent to write that parameter. (important)
 * output
 * - display simple widget like text
 * 
 * import 'package:flutter/material.dart';

  void main() {
    runApp(MaterialApp(home: Text("I believe i can RICH")));
  }
 */

/**
 * 1. How flutter run himself
 */
// void main() {
//   runApp();
// }
