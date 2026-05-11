<div class="card">
        <div class="card-header">
          <div class="card-title">Posledné rezervácie</div>
          <a href="/admin/rezervacie" class="btn btn-outline btn-sm">Všetky</a>
        </div>
        <table class="admin-table">

          <thead>
            <tr>
              <th>Hosť</th>
              <th>Čas</th>
              <th>Osoby</th>
              <th>Dátum rezervácie</th>
              <th>Stav</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($reservations as $reservation): ?>
              <tr>
                <td>
                  <?= htmlspecialchars($reservation['name']) ?>
                </td>
                <td><?= htmlspecialchars($reservation['timing']) ?></td>
                <td><?= htmlspecialchars($reservation['people']) ?></td>
                 <td> <?= date('d.m.Y', strtotime($reservation['date'])) ?></td>
                <td>
                <div style="display:flex; align-items:center; gap:10px;">

                  <?php
                  $statusMap = [
                    0 => ['class' => 'badge-new', 'text' => 'Nová'],
                    1 => ['class' => 'badge-confirmed', 'text' => 'Potvrdená'],
                    2 => ['class' => 'badge-cancelled', 'text' => 'Zrušená'],
                  ];

                $status = (int) ($reservation['status'] ?? 0);

                $class = $statusMap[$status]['class'] ?? 'badge-new';
                $text  = $statusMap[$status]['text'] ?? 'Neznámy';
                ?>

                  <span class="badge <?= $class ?>">
                    <?= $text ?>
                  </span>

                  <?php if ($status === 0): ?>

                    <form method="POST" action="/admin/reservation/status" style="display:inline;">
                      <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                      <input type="hidden" name="status" value="1">
                      <button class="btn btn-success">✔</button>
                    </form>

                    <form method="POST" action="/admin/reservation/status" style="display:inline;">
                      <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                      <input type="hidden" name="status" value="2">
                        <button class="btn btn-danger">✖</button>
                      </form>

                    <?php endif; ?>
                          <form method="POST" action="/admin/reservation/delete" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $reservation['id'] ?>">
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Naozaj zmazať rezerváciu?')">DELETE</button>
                  </form>

                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
