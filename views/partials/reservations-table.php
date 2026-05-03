<div class="card">
        <div class="card-header">
          <div class="card-title">Posledné rezervácie</div>
          <a href="/admin/rezervacie" class="btn btn-outline btn-sm">Všetky</a>
        </div>
        <table class="admin-table">
          <tbody>
            <?php foreach ($reservations as $reservation): ?>
              <tr>
                <td>
                  <span class="table-avatar">
                    <?= strtoupper(substr($reservation['name'], 0, 2)) ?>
                  </span>
                  <?= htmlspecialchars($reservation['name']) ?>
                </td>
                <td><?= htmlspecialchars($reservation['timing']) ?></td>
                <td><?= htmlspecialchars($reservation['people']) ?></td>
                <td>
                  <span class="badge badge-confirmed">Potvrdená</span>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
