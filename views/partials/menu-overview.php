 <div class="card">
      <div class="card-header">
        <div class="card-title"> Dostupné položky menu</div>
      </div>
      <table class="admin-table">
        <thead>
          <tr>
            <th>Položka</th>
            <th>Kategória</th>
            <th>Cena</th>
            <th>Stav</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
           <?php foreach ($items as $item): ?>
            <tr>
                <td><?= htmlspecialchars($item['name']) ?></td>
                <td><?= htmlspecialchars($item['category_name']) ?></td>
                <td style="font-weight:800; color:var(--primary)">€<?= number_format($item['price'], 2) ?></td>
                <td>
                    <?php if ($item['available']): ?>
                        <span class="badge badge-confirmed">Dostupné</span>
                    <?php else: ?>
                        <span class="badge badge-cancelled">Nedostupné</span>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="/admin/menu/edit?id=<?= $item['food_id'] ?>" class="btn btn-outline btn-sm">Upraviť</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
      </table>
    </div>
 
  </main>
 
</div>
 
</body>
</html>
