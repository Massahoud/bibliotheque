import 'package:sqflite/sqflite.dart';

class AbonnementController {
  final Database db;

  AbonnementController(this.db);

  Future<List<Abonnement>> getAbonnements() async {
    final List<Map<String, dynamic>> results = await db.query('abonnements');
    return results.map((e) => Abonnement.fromMap(e)).toList();
  }
}
