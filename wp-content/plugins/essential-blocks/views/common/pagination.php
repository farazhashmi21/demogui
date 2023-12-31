<?php

$html = '';

if ( isset( $totalPosts ) && (int) $totalPosts > (int) $per_page ) {
    if ( isset( $enableMorePosts ) && $enableMorePosts ) {
        $html .= sprintf(
            '<div class="ebpg-pagination %1$s">',
            $loadMoreType === '3' ? "prev-next-btn" : ""
        );

        if ( $loadMoreType === '1' ) {
            $html .= sprintf(
                '<button class="btn ebpg-pagination-button" data-pagenumber="1">%1$s</button>',
                $loadMoreButtonTxt
            );
        }

        $prevTxt = isset( $prevTxt ) ? $prevTxt : "<";
        $nextTxt = isset( $nextTxt ) ? $nextTxt : ">";

        if ( isset( $totalPosts ) && ( $loadMoreType === '2' || $loadMoreType === '3' ) ) {
            $totalPages = ceil( (int) $totalPosts / (int) $per_page );
            $html .= sprintf(
                '<button class="ebpg-pagination-item-previous">
                    %1$s
                </button>',
                esc_html__( $prevTxt )
            );
            for ( $i = 1; $i <= $totalPages; $i++ ) {
                $active = $i == 1 ? "active" : "";

				$html .= sprintf(
					'<button class="ebpg-pagination-item %2$s" data-pagenumber="%1$s">
                        %1$s
                    </button>',
					$i,
					$active
				);
			}
			$html .= sprintf(
				'<button class="ebpg-pagination-item-next">
                    %1$s
                </button>',
                esc_html__( $nextTxt )
            );
        }

		$html .= '</div>';
	}
}

echo wp_kses( $html, 'post' );
