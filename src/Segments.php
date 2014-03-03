<?php
/**
 *
 *
 * @author Roman Piták <roman@pitak.net>
 *
 */

namespace DotMailer\Api;

final class Segments extends Service {

	/**
	 * Gets all segments.
	 *
	 * @param int $select Get this many segments
	 * @param int $skip Skip this many segments from the start
	 * @return mixed
	 */
	public function getAll($select = 1000, $skip = 0) {
		return $this->execute(sprintf("segments?select=%s&skip=%s", $select, $skip));
	}

	/**
	 * Refreshes a segment by ID.
	 *
	 * @param int|string $segmentId
	 * @return mixed
	 */
	public function refresh($segmentId) {
		return $this->execute(array(sprintf("segments/refresh/%s", $segmentId), 'POST'));
	}

}