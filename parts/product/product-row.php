<?php
$isCart = $template == 'cart';
$inCart = rand(0, 4);
global $product;
?>
<tr data-toggle="collapse" data-target="#tr-<?= $table->id . '-' . $product['id']; ?>" class="accordion-toggle<?= $inCart >= 3 ? ' in-cart' : ''; ?>" aria-expanded="<?= $open ? 'true' : 'false'; ?>">
    <?php
    foreach ($product as $k => $v) {
        if (in_array($k, ['id', 'Price', 'Details'])) {
            continue;
        }
        $val = is_array($v) ? $v[rand(1, count($v) - 1)] : $v;
        $onOffer = '';
        if ($k == 'Name') {
            $rand = (float)rand() / (float)getrandmax();
            if ($rand < 0.44) {
                $onOffer =
                    '<div class="offerWrap">
                        <i class="fa fa-tag"></i>
                        <div class="offerTag">
                            <span class="tagTitle">30% OFF</span>
                            <span class="tagDtail">End date</span>
                            <span class="tagDate">1/2/17</span>
                        </div>
                    </div>';
                $mNm = false;
            } else if ($rand > 0.88) {
                $onOffer =
                    '<div class="offerWrap">
                        <i class="fa fa-tag"></i>
                            <div class="offerTag">
                                <span class="tagTitle">30% OFF</span>
                                <span class="tagDtail">End date</span>
                                <span class="tagDate">1/2/17</span>
                            </div>
                        <div class="mNm-available">
                            <i class="fa bwg-i-mix-and-match"></i>
                        </div>
                    </div>';
                $mNm = true;
            } else {
                $onOffer =
                    '<div class="mNmSingle">
                        <i class="fa bwg-i-mix-and-match"></i>
                    </div>';
                $mNm = true;
            };
        }
        echo '<td><div class="rltv">' . $onOffer . $val . '</div></td>';
    }
    ?>
    <td class="price">
        <?php if (is_array($product['Price'])) { ?>
            <span class="old"><?= $product['Price']['old']; ?></span> <?= $product['Price']['new']; ?>
        <?php } else {
            echo $product['Price'];
        } ?>
    <td>
        <div class="dropdown favMenu">
            <a href="#"
                    class="dropdown-toggle placer"
                    id="favDd-<?= $table->id . '-' . $product['id']; ?>"
                    title="Add product to favorites"
                    aria-haspopup="true" aria-expanded="false"
                    data-toggle="dropdown"
            ><i class="fa fa-heart-o fa-2x"></i>
                <i class="fa fa-heart fa-2x"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="favDd-<?= $table->id . '-' . $product['id']; ?>">
                <li><a href="#">Fav list 1</a></li>
                <li><a href="#">Fav list 2</a></li>
                <li><a href="#">Fav list 3</a></li>
                <li class="addNewList"></li>
            </ul>
        </div>
    </td>
    <td class="no-grow hide-x">
        <div class="input-group qty" itemscope="qty-<?= $table->id . '-' . $product['id']; ?>">
				<span class="input-group-addon">
					<i class="fa fa-minus"></i>
				</span>
            <input type="text" class="form-control" value="1" name="qty-<?= $table->id . '-' . $product['id']; ?>"/>
            <span class="input-group-addon">
					<i class="fa fa-plus"></i>
				</span>
        </div>
    </td>
    <td class="no-grow hide-x">
        <a href="#<?= $isCart ? 'remove-from-' : 'add-to-'; ?>cart?id=<?= $product['id']; ?>"
                onclick="void(0)" class="btn btn-cart btn-sm <?= $isCart ? 'btn-danger' : 'btn-success'; ?>">
            <i class="fa fa-2x bwg-i-cart"></i>
        </a>
    </td>
</tr>
<tr class="hiddenRow">
    <td colspan="<?= $table->colspan; ?>">
        <div class="collapse<?= $open ? ' in' : ''; ?>" id="tr-<?= $table->id . '-' . $product['id']; ?>" style="overflow: hidden; clear: both;">
            <?php if (isset($mNm) && $mNm !== false) {
                for ($i = 1; $i < 5; $i++) {
                    $title = 'Mix and Match # '. $i . ' for <em>' . $product['Name'] . '</em>';
                    echo '<div class="mixNmatch"
                           data-title="' . $title . '"' .
                           'data-description="This is a very long description for testing purposes. This is a very long description for testing purposes. This is a very long description for testing purposes. This is a very long description for testing purposes."
                           data-from="20.05.2018"
                           data-to="20.08.2019"
                           data-threshold="$20.000">' . $title . '</div>';
                }
            }?>
            <div class="tdWrapper">
                <form id="orderFrm<?= $product['id']; ?>" action="./" method="get" onsubmit="return doAddToCart('<?= $product['id']; ?>', '', '1')">
                    <input type="hidden" name="pcode" value="<?= $product['id']; ?>"/>
                    <input type="hidden" name="qis" value=""/>
                    <input type="hidden" name="isProm" value="N"/>
                    <input type="hidden" name="qty" value="0">
                </form>
                <div class="imageWrap"><img class="img-responsive" src="<?= $product['Details']['image']; ?>"/></div>
                <div class="main-col">
                    <div>
                        <div class="p-Title"><?= $product['Name']; ?></div>
                        <p class="p-Description"><?= $product['Details']['Description']; ?></p>
                    </div>
                    <div class="p-Details">
                        <?php
                        foreach ($product['Details'] as $k => $value) {
                            if (in_array($k, ['image', 'Description'])) {
                                continue;
                            }
                            ?>
                            <div>
                                <span class="key"><?= $k; ?></span>
                                <span class="value"><?= $value; ?></span>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="btn-group btn-group-sm separate productActions">
                        <div class="bar-rating">
                            <?php $rating = rand(10, 50) / 10; ?>
                            <select id="rating-<?= $product['id']; ?>" data-initial="<?= $rating; ?>">
                                <option>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <span class="badge"><?= $rating; ?></span>
                        </div>
                        <a href="#" class="btn btn-sm btn-outline btn-default"
                                title="Recommend this product"
                        ><i class="fa fa-thumbs-up"></i>
                            <span class="badge">0</span>
                        </a>
                        <a href="#" class="btn btn-sm btn-outline btn-default"
                                title="Promote this product"
                        ><i class="fa fa-bullhorn"></i>
                            <span class="badge">3</span></a>
                    </div>
                </div>
                <div class="right-col">
                    <div class="iconBar">
                        <i class="fa fa-2x fa-star"></i>
                        <i class="fa fa-2x fa-exclamation-circle"></i>
                        <i class="fa fa-2x fa-file"></i>
                        <i class="fa fa-2x fa-tag"></i>
                    </div>
                    <div class="rltv">
                        <a href="#<?= $isCart ? 'remove-from-' : 'add-to-'; ?>cart?id=<?= $product['id']; ?>"
                                onclick="void(0)"
                                class="btn <?= $isCart ? 'btn-cart btn-inverse' : 'btn-success'; ?> btn-block"><?= $isCart ? 'Remove' : 'Add to cart'; ?></a>
                        <a href="#" class="btn btn-default btn-stock btn-block accordion-toggle btn-outline"
                                data-toggle="collapse" data-target="#stock-<?= $table->id . '-' . $product['id']; ?>">View Stock Card</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse" id="stock-<?= $table->id . '-' . $product['id']; ?>">
            <div class="tdWrapper"><!--Don't remove this wrapper, it's needed for smooth animation !-->
                <div class="stockcard" id="info88216">
                    <table cellspacing="1" class="table">
                        <tr class="sales_info_title_Chill">
                            <th class="sales_info_detail" style="width: 61px;"><strong>Sales</strong></th>
                            <th class="sales_info_detail">Sun</th>
                            <th class="sales_info_detail">Mon</th>
                            <th class="sales_info_detail">Tues</th>
                            <th class="sales_info_detail">Wed</th>
                            <th class="sales_info_detail">Thur</th>
                            <th class="sales_info_detail">Fri</th>
                            <th class="sales_info_detail">Sat</th>
                        </tr>
                        <tr class="sales_info_row_Chill">
                            <td>last week</td>
                            <td>
                                <div>
                                    <span id="s_lw_val_0_88216"></span>
                                    <span id="s_lw_qty_0_88216"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_lw_val_1_88216"></span>
                                    <span id="s_lw_qty_1_88216"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_lw_val_2_88216"></span>
                                    <span id="s_lw_qty_2_88216"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_lw_val_3_88216"></span>
                                    <span id="s_lw_qty_3_88216"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_lw_val_4_88216"></span>
                                    <span id="s_lw_qty_4_88216"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_lw_val_5_88216"></span>
                                    <span id="s_lw_qty_5_88216"></span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_lw_val_6_88216"></span>
                                    <span id="s_lw_qty_6_88216"></span>
                                </div>
                            </td>
                        </tr>
                        <tr class="sales_info_row_Chill">
                            <td>4 wk avg</td>
                            <td>
                                <div>
                                    <span id="s_4w_qty_0_88216">111.25*</span>
                                    <span id="s_4w_val_0_88216">€142.34*</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_4w_qty_1_88216">118.5*</span>
                                    <span id="s_4w_val_1_88216">€149.82*</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_4w_qty_2_88216">96.5*</span>
                                    <span id="s_4w_val_2_88216">€122.16*</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_4w_qty_3_88216">97.75*</span>
                                    <span id="s_4w_val_3_88216">€124.24*</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_4w_qty_4_88216">124*</span>
                                    <span id="s_4w_val_4_88216">€159.50*</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_4w_qty_5_88216">146.5*</span>
                                    <span id="s_4w_val_5_88216">€187.01*</span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span id="s_4w_qty_6_88216">150.5*</span>
                                    <span id="s_4w_val_6_88216">€188.96*</span>
                                </div>
                            </td>
                        </tr>
                        <tr class="sales_info_row_Chill">
                            <td>daily rank</td>
                            <td id="s_dr_rank_0_88216">2</td>
                            <td id="s_dr_rank_1_88216">1</td>
                            <td id="s_dr_rank_2_88216">1</td>
                            <td id="s_dr_rank_3_88216">1</td>
                            <td id="s_dr_rank_4_88216">1</td>
                            <td id="s_dr_rank_5_88216">1</td>
                            <td id="s_dr_rank_6_88216">1</td>
                        </tr>
                        <tr class="sales_info_title_Chill">
                            <td colspan="8" class="td-left"><strong>Purchases</strong></td>
                        </tr>
                        <tr class="sales_info_row_Chill">
                            <td>last week</td>
                            <td colspan="7" id="p_lw_0_88216"></td>
                        </tr>
                        <tr class="sales_info_row_Chill">
                            <td>4 week avg</td>
                            <td colspan="7" id="p_4w_0_88216"></td>
                        </tr>
                        <tr class="sales_info_row_Chill">
                            <td colspan="8" id="graph_header_store_88216">
                                <a class="stockcardlink accordion-toggle collapsed"
                                        data-toggle="collapse" data-target="#sG-<?= $table->id . '-' . $product['id']; ?>"
                                        href="#">Display Sales Trend My Store <span class="toggLer"><i
                                                class="fa fa-2x fa-chevron-down"></i></span></a></td>
                        </tr>
                        <tr class="hiddenRow">
                            <td colspan="8">
                                <div id="sG-<?= $table->id . '-' . $product['id']; ?>" aria-expanded="false" class="collapse">
                                    <div class="tdWrapper">
                                        <img class="img-responsive" src="/assets/image/example_graph.jpg">
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </td>
</tr>