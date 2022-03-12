
<h3 style="font-size: 2.5rem; text-align:center">LISTE DES JOUEURS PAR SCORE</h3>
    <div style="border:2px solid rgb(21, 216, 216);border-radius: 10px; margin:40px;">
        <table>
           <tr> 
               <th>Nom</th>
               <th>Prenom</th>
               <th>Score</th>
            </tr>
           
            <?php foreach($data as $value):?>
            <tr>
                <td><?=$value['nom']?></td>
                <td><?=$value['prenom']?></td>
                <td><?=$value['score']?></td>
            </tr>
            <?php endforeach ?>
            
        </table>
    </div>
    <button class="suivant">Suivant</button>
		
   
