<div class="card">
        <div class="card-header">
          <div class="card-title">Posledné rezervácie</div>
          <a href="/admin/rezervacie" class="btn btn-outline btn-sm">Všetky</a>
        </div>
        <table class="admin-table">

          <thead>
            <tr>
              <th>Hosť</th>
              <th>Stôl</th>
              <th>Čas</th>
              <th>Osoby</th>
              <th>Dátum rezervácie</th>
              <th>Stav</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($reservations as $reservation): ?>
              <tr>
                <td><?= htmlspecialchars($reservation['name']) ?></td>
                <td><?= htmlspecialchars($reservation['table_name']) ?></td>
                <td><?= htmlspecialchars($reservation['time']) ?></td>
                <td><?= htmlspecialchars($reservation['number_of_guests']) ?></td>
                <td> <?= date('d.m.Y', strtotime($reservation['date'])) ?></td>
                <td>

                  <div style="display:flex; align-items:center; gap:10px;">

                  <?php
                  $statusMap = [
                    1 => ['class' => 'badge-new', 'text' => 'Nová'],
                    2 => ['class' => 'badge-confirmed', 'text' => 'Potvrdená'],
                    3 => ['class' => 'badge-cancelled', 'text' => 'Zrušená'],
                  ];

                $status = (int) ($reservation['reservation_status_id'] ?? 1);
                $class = $statusMap[$status]['class'] ?? 'badge-new';
                $text  = $statusMap[$status]['text'] ?? 'Neznámy';
                ?>

                  <span class="badge <?= $class ?>">
                    <?= $text ?>
                  </span>

                  <?php if ($status === 1): ?>

                    <form method="POST" action="/admin/reservation/status" style="display:inline;">
                      <input type="hidden" name="id" value="<?= $reservation['reservation_id'] ?>">
                      <input type="hidden" name="status" value="2">
                      <button class="btn btn-success">✔</button>
                    </form>

                    <form method="POST" action="/admin/reservation/status" style="display:inline;">
                      <input type="hidden" name="id" value="<?= $reservation['reservation_id'] ?>">
                      <input type="hidden" name="status" value="3">
                        <button class="btn btn-danger">✖</button>
                      </form>

                    <?php endif; ?>

                  <form method="POST" action="/admin/reservation/delete" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $reservation['reservation_id'] ?>">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Naozaj zmazať rezerváciu?')">DELETE</button>
                  </form>

                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
